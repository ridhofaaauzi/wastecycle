<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SampahCreateRequest;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminKelolaSampahController extends Controller
{
    public function index()
    {
        $wastes = Waste::latest()->get();
        return view('admin.kelolaSampah.kelolaSampah', compact('wastes'));
    }

    public function create()
    {
        return view('admin.kelolaSampah.create');
    }

    public function store(SampahCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            Waste::create([
                'jenis_sampah' => $request->input("jenis_sampah"),
                'poin' => $request->input("poin"),
                'image' => $imagePath,
            ]);

            DB::commit();
            return redirect()->route('admin.kelolaSampah')->with('success', 'Waste added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to add waste', ['error' => $th->getMessage()]);

            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $waste = Waste::findOrFail($id);
        return view('admin.kelolaSampah.edit', compact('waste'));
    }
    public function update(SampahCreateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $waste = Waste::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($waste->image);
                $imagePath = $request->file('image')->store('images', 'public');
                $waste->image = $imagePath;
            }

            $waste->jenis_sampah = $request->input("jenis_sampah");
            $waste->poin = $request->input("poin");
            $waste->save();

            DB::commit();
            return redirect()->route('admin.kelolaSampah')->with('success', 'Waste updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to update Waste', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to update Waste',
                'info' => $th->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $waste = Waste::findOrFail($id);
            if ($waste->image) {
                Storage::disk('public')->delete($waste->image);
            }

            $waste->delete();

            return redirect()->route('admin.kelolaSampah')->with('success', 'Waste deleted successfully');
        } catch (\Throwable $th) {
            Log::error('Failed to delete Waste', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to delete Waste',
                'info' => $th->getMessage()
            ]);
        }
    }
}