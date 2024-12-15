@extends('layouts.layout')
@section('title')
    Blog Page
@endsection
@section('content')
    @include('components.navbar')
    <section>
        <div class="relative">
            <img src="{{ asset('assets/images/blog/bg-blog.png') }}" alt="img-blog" class="w-full h-fit lg:h-[715px]">
            <div class="absolute lg:top-40 top-20">
                <div class="flex justify-between flex-col items-center w-full lg:gap-10 gap-5">
                    <h1 class="lg:text-5xl font-bold text-white text-center w-3/4 text-lg">Memahami Bahaya Sampah Plastik:
                        Ancaman
                        Lingkungan yang Terus
                        Meningkat</h1>
                    <p class="w-3/4 text-white lg:text-lg text-center text-xs hidden md:flex">
                        Sampah plastik merupakan salah satu masalah lingkungan yang mendesak dan terus berkembang di seluruh
                        dunia. Dibuat untuk kenyamanan dan daya tahan yang lama, plastik sebenarnya menjadi momok yang
                        menakutkan bagi lingkungan kita.
                    </p>
                    <a href="#" class="bg-primary text-white lg:py-2 lg:px-4 px-2 py-1 rounded-md">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-between items-start gap-10 p-6 py-10">
            <div class="flex flex-col justify-between gap-10 px-20">
                @foreach ($posts as $post)
                    <div class="flex items-center gap-5">
                        <div>
                            <img src="{{ Storage::url($post->image) }}" alt="" width="300"
                                class="rounded-lg hidden lg:flex aspect-square">
                        </div>
                        <div>
                            <a href="{{ route('user.detailBlog', $post->id) }}"
                                class="font-bold text-xl lg:text-2xl mb-5">{{ $post->title }}</a>
                            <p class="mb-4 text-sm lg:text-lg text-[#404040]  mt-5">
                                {{ implode(' ', array_slice(explode(' ', $post->content), 0, 10)) }}{{ count(explode(' ', $post->content)) > 10 ? '...' : '' }}
                            </p>
                            <span class="text-sm text-[#404040]">
                                {{ $post->user->username }} - {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
