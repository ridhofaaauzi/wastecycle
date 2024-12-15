@extends('layouts.layout')
@section('title')
    Kontak Kami
@endsection
@section('content')
    @include('components.navbar')
    <section>
        <div class="flex justify-center items-center flex-col">
            <h1 class="lg:text-5xl uppercase font-semibold text-center mt-10 mb-5 text-3xl">Kontak Kami</h1>
            <p class="text-lg text-[#404040] text-center max-w-3xl">Punya pertanyaan lebih lanjut? Jangan ragu untuk
                menghubungi
                kami. Kami
                siap membantu Anda dalam setiap langkah perubahan positif yang Anda lakukan untuk lingkungan.
            </p>
        </div>
        <div class="lg:w-full h-fit lg:h-[500px] p-6 lg:flex lg:justify-between lg:items-center mb-10">
            <div class="lg:w-full flex justify-center items-center">
                <img src="{{ asset('assets/images/kontak/img-contact.png') }}" alt="img-contact" class="hidden lg:flex" />
            </div>
            <div class="mb-14 lg:mb-0 lg:w-1/2">
                <div class="flex flex-col justify-center gap-3 mb-5">
                    <a href="#">
                        <i class="fa-solid fa-envelope fa-2xl"></i>
                    </a>
                    <p class="font-semibold">Mengirim Email</p>
                    <p class="font-semibold underline">wastecycle@gmail.com</p>
                </div>
                <div class="flex flex-col justify-center gap-3">
                    <a href="#">
                        <i class="fa-solid fa-phone fa-2xl"></i>
                    </a>
                    <p class="font-semibold">Hubungi Kami</p>
                    <p class="font-semibold underline">+62 21854 2563 12</p>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
