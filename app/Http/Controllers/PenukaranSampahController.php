<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenukaranSampahCreateRequest;
use App\Models\TransactionWaste;
use App\Models\User;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenukaranSampahController extends Controller
{
    public function index()
    {
        $wastes = Waste::latest()->get();
        return view('user.penukaranSampah.index', compact('wastes'));
    }

    public function create($id)
    {
        $waste = Waste::findOrFail($id);
        return view('user.penukaranSampah.create', compact('waste'));
    }

    public function store(PenukaranSampahCreateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
            $waste = Waste::findOrFail($id);
            $user = User::findOrFail($user_id);

            $berat_sampah = $request->input('berat_sampah');
            $current_points = $user->points->total_poin;
            $total_poin = $berat_sampah * $waste->poin;

            $new_total_points = $current_points + $total_poin;

            $userPoints = $user->points;
            $userPoints->total_poin = $new_total_points;
            $userPoints->save();

            TransactionWaste::create([
                'tanggal_pengambilan' => $request->input("tanggal_pengambilan"),
                'berat_sampah' => $berat_sampah,
                'catatan' => $request->input("catatan"),
                'total_poin' => $total_poin,
                'user_id' => $user_id,
                'waste_id' => $waste->id,
            ]);

            DB::commit();
            return redirect()->route('user.penukaranSampah')->with('success', 'Transaction Waste added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to add waste', ['error' => $th->getMessage()]);

            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}