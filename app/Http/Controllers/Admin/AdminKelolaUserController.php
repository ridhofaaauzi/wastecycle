<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminKelolaUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.kelolaUser.kelolaUser', compact('users'));
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.kelolaUser.show', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.kelolaUser.edit', compact('user'));
    }

    public function update(UserCreateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->username = $request->input("username");
            $user->email = $request->input("email");
            $user->alamat = $request->input("alamat");
            $user->nohp = $request->input("nohp");
            $user->save();

            DB::commit();
            return redirect()->route('admin.kelolaUser')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to update user', ['error' => $th->getMessage()]);
            return redirect()->back()->with([
                'error' => 'Failed to update user',
                'info' => $th->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.kelolaUser')->with('success', 'user deleted successfully');
        } catch (\Throwable $th) {
            Log::error('Failed to delete user', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to delete user',
                'info' => $th->getMessage()
            ]);
        }
    }
}