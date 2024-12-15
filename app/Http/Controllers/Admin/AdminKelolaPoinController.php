<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointCreateRequest;
use App\Models\Point;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminKelolaPoinController extends Controller
{
    public function index()
    {
        $rewards = Reward::latest()->get();
        return view('admin.kelolaPoin.kelolaPoin', compact('rewards'));
    }

    public function create()
    {
        return view('admin.kelolaPoin.create');
    }

    public function store(PointCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            Reward::create([
                'name' => $request->input("name"),
                'poin' => $request->input("poin"),
                'image' => $imagePath,
            ]);

            DB::commit();
            return redirect()->route('admin.kelolaPoin')->with('success', 'Reward added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to add Reward', ['error' => $th->getMessage()]);

            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        return view('admin.kelolaPoin.edit', compact('reward'));
    }
    public function update(PointCreateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $reward = Reward::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($reward->image);
                $imagePath = $request->file('image')->store('images', 'public');
                $reward->image = $imagePath;
            }

            $reward->name = $request->input("name");
            $reward->poin = $request->input("poin");
            $reward->save();

            DB::commit();
            return redirect()->route('admin.kelolaPoin')->with('success', 'Reward updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to update Reward', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to update Reward',
                'info' => $th->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $reward = Reward::findOrFail($id);
            if ($reward->image) {
                Storage::disk('public')->delete($reward->image);
            }

            $reward->delete();

            return redirect()->route('admin.kelolaPoin')->with('success', 'reward deleted successfully');
        } catch (\Throwable $th) {
            Log::error('Failed to delete reward', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to delete reward',
                'info' => $th->getMessage()
            ]);
        }
    }
}