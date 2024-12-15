<?php

namespace App\Http\Controllers;

use App\Models\Redemption;
use App\Models\Reward;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RedemptionController extends Controller
{

    public function index()
    {
        $redemptions = Redemption::latest()->get();
        return view('admin.penukaranPoin.index', compact('redemptions'));
    }

    public function store($id)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
            $reward = Reward::findOrFail($id);
            $user = User::findOrFail($user_id);

            $current_points = $user->points->total_poin;

            if ($current_points < $reward->poin) {
                return redirect()->back()->with('error', 'Not enough points to redeem this reward');
            }

            $new_total_points = $current_points - $reward->poin;

            $userpoints = $user->points;
            $userpoints->total_poin = $new_total_points;
            $userpoints->save();

            $dateNow = Carbon::now()->toDateTimeString();

            Redemption::create([
                'tanggal_penukaran' => $dateNow,
                'total_poin' => $reward->poin,
                'user_id' => $user_id,
                'reward_id' => $reward->id,
            ]);

            DB::commit();
            return redirect()->route('user.penukaranPoin', compact('reward'))->with('success', 'Reward redeemed successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to redeem reward', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}