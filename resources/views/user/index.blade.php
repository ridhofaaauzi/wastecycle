@extends('layouts.layout')
@section('title')
    Home Page
@endsection
@section('content')
    @include('components.navbar')
    <section class="z-0">
        <div>
            <div class="bg-[#CFEDE1] w-full h-fit lg:h-[750px] p-6">
                <div class="w-full">
                    <div class="container flex flex-wrap items-center justify-center mx-auto mt-10 md:flex-row">
                        <div class="mb-14 lg:mb-0 lg:w-1/2">
                            <h1
                                class="xl:text-7xl font-bold uppercase max-w-xl leading-none text-center lg:text-left lg:leading-tight mb-5 text-5xl">
                                Waste<span class="text-primary">cycle</span></h1>
                            <p class="xl:text-2xl max-w-lg text-lg lg:text-left text-center">Ubah sampah menjadi harta
                                dengan
                                wastecycle
                                memberikan banyak manfaat</p>
                            <div class="flex justify-center mt-5 lg:justify-start">
                                <a href="#" class="bg-primary text-white py-2 px-4 rounded-md">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="{{ asset('assets/images/hero/img-hero.png') }}" alt="img-hero"
                                class="ml-auto w-8/12 hidden lg:flex" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full h-fit lg:h-[650px] p-6">
        <h1 class="lg:text-5xl uppercase font-semibold text-center mt-10 text-3xl">Layanan yang
            tersedia</h1>
        <div class="flex items-center justify-center container mx-auto mt-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="rounded-xl border border-[#dcdcdc] cursor-pointer hover:scale-105 hover:transition-all">
                    <div class="p-5 flex flex-col justify-center items-center text-center">
                        <div class="rounded-xl overflow-hidden mt-10">
                            <img src="{{ asset('assets/images/hero/icon-artikel.png') }}" alt="icon-artikel">
                        </div>
                        <h5 class="text-2xl md:text-3xl font-semibold mt-3">Artikel</h5>
                        <p class="text-[#404040] text-sm mt-3 max-w-72 mb-10">layanan yang diciptakan untuk menyediakan
                            pengalaman
                            yang
                            lebih bagi
                            pengguna dalam menjelajahi
                            informasi seputar daur ulang.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-[#dcdcdc] cursor-pointer hover:scale-105 hover:transition-all">
                    <div class="p-5 flex flex-col justify-center items-center text-center">
                        <div class="rounded-xl overflow-hidden mt-10">
                            <img src="{{ asset('assets/images/hero/icon-poin.png') }}" alt="icon-poin">
                        </div>
                        <h5 class="text-2xl md:text-3xl font-semibold mt-3">Poin Reward</h5>
                        <p class="text-[#404040] text-sm mt-3 max-w-72 mb-10">Setiap kali kamu melakukan pertukaran sampah,
                            kamu akan menerima poin yang bisa ditukarkan dengan hadiah-hadiah keren!</p>
                    </div>
                </div>
                <div class="rounded-xl border border-[#dcdcdc] cursor-pointer hover:scale-105 hover:transition-all">
                    <div class="p-5 flex flex-col justify-center items-center text-center">
                        <div class="rounded-xl overflow-hidden mt-10">
                            <img src="{{ asset('assets/images/hero/icon-sampah.png') }}" alt="icon-sampah">
                        </div>
                        <h5 class="text-2xl md:text-3xl font-semibold mt-3">Tukar Sampah</h5>
                        <p class="text-[#404040] text-sm mt-3 max-w-72 mb-10">Anda dapat mendaur ulang barang-barang yang
                            tidak terpakai. Temukan nilai baru dalam setiap sampah yang Anda kumpulkan sambil berkontribusi
                            pada upaya pelestarian lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="bg-[#CFEDE1] h-fit lg:h-[650px] p-6">
            <div class="flex justify-center items-center w-full">
                <div>
                    <h1 class="lg:text-5xl uppercase font-semibold text-center mt-10 text-3xl mb-5">Jenis Sampah</h1>
                    <p class="text-lg text-[#404040] text-center">Lihat semua jenis sampah yang kami daur ulang.</p>
                    <div class="flex items-center justify-center container
                    mx-auto mt-20">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-kertas.png') }}" alt="icon-kertas">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Kertas</p>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-plastik.png') }}" alt="icon-plastik">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Plastik</p>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-botol-kaca.png') }}"
                                            alt="icon-botol-kaca">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Botol Kaca</p>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-elektronik.png') }}"
                                            alt="icon-elektronik">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Elektronik</p>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-alluminium.png') }}"
                                            alt="icon-aluminium">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Aluminium</p>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white w-48 cursor-pointer hover:scale-105 hover:transition-all">
                                <div class="p-5 flex flex-col justify-center items-center text-center">
                                    <div class="rounded-xl overflow-hidden">
                                        <img src="{{ asset('assets/images/hero/icon-besi-logam.png') }}"
                                            alt="icon-besi-logam">
                                    </div>
                                    <p class="text-lg font-semibold mt-3">Besi & Logam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="w-full h-fit lg:h-[750px] p-6 flex justify-between items-center">
            <div class="lg:w-1/2 flex justify-center items-center">
                <img src="{{ asset('assets/images/hero/img-solusi.png') }}" alt="img-solusi"
                    class="w-1/2 hidden lg:flex" />
            </div>
            <div class="mb-14 lg:mb-0 lg:w-1/2">
                <h1
                    class="xl:text-7xl font-bold uppercase max-w-xl leading-none text-center lg:text-left lg:leading-tight mb-5 text-5xl">
                    Solusi</h1>
                <p class="xl:text-lg max-w-xl text-lg text-center lg:text-left">membantu meningkatkan kesadaran
                    tentang pentingnya daur ulang dan pengelolaan sampah yang lebih baik. Dengan memberikan
                    pengguna informasi tentang cara-cara untuk memanfaatkan kembali sampah</p>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
