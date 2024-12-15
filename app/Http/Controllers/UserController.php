<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest; // Menggunakan request khusus untuk validasi input
use App\Http\Resources\UserResource; // Resource untuk format data pengguna
use App\Models\User; // Model untuk tabel `users`
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk transaksi database
use Illuminate\Support\Facades\Log; // Untuk pencatatan log

class UserController extends Controller
{
    /**
     * Menampilkan profil pengguna berdasarkan ID.
     *
     * @param int $id ID pengguna
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Mencari pengguna berdasarkan ID, akan gagal jika tidak ditemukan
        $user = User::findOrFail($id);

        // Mengembalikan view "user.profile" dengan data pengguna
        return view("user.profile", compact('user'));
    }

    /**
     * Memperbarui data pengguna.
     *
     * @param UserCreateRequest $request Request yang berisi data validasi
     * @param int $id ID pengguna
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserCreateRequest $request, $id)
    {
        // Memulai transaksi database
        DB::beginTransaction();
        try {
            // Mencari pengguna berdasarkan ID, akan gagal jika tidak ditemukan
            $user = User::findOrFail($id);

            // Memperbarui atribut pengguna dari input request
            $user->email = $request->input("email");
            $user->username = $request->input("username");
            $user->nohp = $request->input("nohp");
            $user->alamat = $request->input("alamat");
            $user->save(); // Menyimpan perubahan ke database

            // Commit transaksi jika semua operasi berhasil
            DB::commit();

            // Redirect ke halaman profil dengan pesan sukses
            return redirect()->route('user.profile')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Mencatat error ke dalam log file
            Log::error('Failed to update User', ['error' => $th->getMessage()]);

            // Redirect kembali dengan pesan error dan detail informasi
            return redirect()->back()->with([
                'error' => 'Failed to update User',
                'info' => $th->getMessage()
            ]);
        }
    }

    /**
     * Menampilkan data pengguna dalam format Resource API.
     *
     * @param Request $request Request HTTP
     * @return \App\Http\Resources\UserResource
     */
    public function userResource(Request $request)
    {
        // Mengambil data pengguna pertama dari database
        $user = User::first();

        // Mengembalikan data pengguna dalam format Resource
        return new UserResource($user);
    }
}
