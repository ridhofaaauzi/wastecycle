@extends('layouts.layout')
@section('content')
@section('title')
    Login Page
@endsection
<section class="h-auto container mx-auto px-4">
    <div class="flex justify-end align-items-end mt-3">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="w-48">
    </div>
    <div class="flex h-auto flex-wrap items-center justify-center lg:justify-between font-poppins" style="height: 50rem">
        <div class="shrink-1 mb-12 md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
            <img src="{{ asset('assets/images/authentication/login/login-img.png') }}"
                class="w-4/5 mx-auto md:hidden sm:hidden lg:block" alt="login-img" />
        </div>

        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
            <h1 class="text-5xl font-semibold mb-5 mt-5">Login</h1>
            @if (session('success'))
                <div class="w-auto flex bg-primary p-3 rounded">
                    <div class="text-white ">{{ session('success') }}</div>
                </div>
            @endif
            <form action="{{ route('loginPost') }}" method="POST">
                @csrf
                <div class="mt-3 ">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="w-full p-3 border-2 border-[#79747E] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary"
                            placeholder="Masukkan email Anda" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="text-red-600 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3 ">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="password"
                            class="w-full p-3 border-2 border-[#79747E] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary"
                            placeholder="Masukkan password Anda" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="text-red-600 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit"
                        class="text-white bg-primary font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-full">Login</button>
                </div>
                <div class="mt-3 flex justify-center">
                    <div class="mt-2 flex justify-center gap-3">
                        <p class="text-[#404040] text-opacity-50">Don't have an account?</p>
                        <a href="{{ route('register') }}" class="font-bold" style="color: #1D397F;">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
