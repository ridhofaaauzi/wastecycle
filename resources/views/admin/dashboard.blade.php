@extends('admin.layouts.layout')
@section('content')
    <section>
        <main class="h-full max-h-screen rounded-xl transition-all duration-200">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col justify-center items-center text-center min-w-0 mb-6 break-words min-h-svh bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h1 class="font-bold" style="font-size: 42px">Selamat Datang di Dashboard</h1>
                            <h2 class="font-semibold" style="font-size: 32px">Halo {{ auth()->user()->username }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
