@extends('layouts.layout')
@section('title')
    Blog Detail Page
@endsection
@section('content')
    @include('components.navbar')
    <section class="z-0 p-6">
        <div class="w-full flex justify-center flex-col px-20 mt-10">
            <img src="{{ Storage::url($post->image) }}" alt="" class="w-full rounded-lg h-[700px] aspect-square">
            <h1 class="text-3xl font-semibold mt-5">
                {{ $post->title }}
            </h1>
            <span class="text-sm text-[#404040] mt-5">
                {{ $post->user->username }} - {{ $post->created_at->diffForHumans() }}
            </span>
            <p class="mt-5 text-[#404040]">
                {{ $post->content }}
            </p>
        </div>
    </section>
    @include('components.footer')
@endsection
