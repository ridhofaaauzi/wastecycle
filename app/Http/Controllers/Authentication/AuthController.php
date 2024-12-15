<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserCreateRequest;
use App\Http\Requests\RegisterUserCreateRequest;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('authentication/register/index');
    }

    public function registerPost(RegisterUserCreateRequest $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);

            Point::create([
                'total_poin' => 0,
                'user_id' => $user->id
            ]);

            $user->assignRole('user');

            return redirect()->route('login')
                ->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->route('register')
                ->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function login()
    {
        return view('authentication/login/index');
    }

    public function loginPost(LoginUserCreateRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.index')->with('success', 'Login successfully');
        } else {
            return redirect()->route('login')->with('error', 'Login failed. Please check your credentials and try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}