@extends('layouts.layout')
@section('title')
    Profile Page
@endsection
@section('content')
    @include('components.navbar')
    <section class="p-6">
        <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Halaman Profile</h2>
        <div class="d-flex justify-center">
            @if (session('success'))
                <div class="px-4 mt-3 mb-3">
                    <div class="w-[300px] flex bg-primary p-4 rounded">
                        <div class="text-white">{{ session('success') }}</div>
                    </div>
                </div>
            @endif
        </div>
        <div class="mx-auto max-w-2xl border border-[#dcdcdc] rounded-lg p-6">

            <form action="{{ route('user.profile.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            value={{ $user->email }}>
                    </div>
                    <div class="w-full">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="username" id="username"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            value="{{ $user->username }}">
                    </div>
                    <div class="w-full">
                        <label for="nohp" class="block mb-2 text-sm font-medium text-gray-900">No Handphone</label>
                        <input type="number" name="nohp" id="nohp"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            value="{{ $user->nohp }}">
                    </div>
                    <div class="w-full">
                        <label for="poin" class="block mb-2 text-sm font-medium text-gray-900">Poin</label>
                        <input type="number" name="poin" id="poin"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            value="{{ $user->points->total_poin }}" disabled>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="8"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-5">{{ $user->alamat }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit"
                        class="w-full  items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
    @include('components.footer')
@endsection
