<!-- resources/views/user/penukaranSampah/pickup.blade.php -->
@extends('layouts.layout')

@section('title')
    Detail Penukaran Sampah Page
@endsection

@section('content')
    @include('components.navbar')
    <section class="p-6">
        <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Detail Penukaran Sampah</h2>
        <div class="mx-auto max-w-2xl bg-[#F4F4F4] rounded-lg p-6">
            <div class="bg-[#FFFFFF] p-5 rounded-lg">
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Jenis Sampah :</h4>
                    <p class="text-[#828282]">Kertas</p>
                </div>
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Nama Penukar :</h4>
                    <p class="text-[#828282]">Ridho Fauzi</p>
                </div>
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Jumlah Poin :</h4>
                    <p class="text-[#828282]">100</p>
                </div>
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Berat Sampah :</h4>
                    <p class="text-[#828282]">1 Kg</p>
                </div>
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Tanggal Pengambilan :</h4>
                    <p class="text-[#828282]">30 Juni 2024</p>
                </div>
                <div class="flex justify-between mb-10">
                    <h4 class="font-bold">Alamat :</h4>
                    <p class="text-[#828282]">Depok, Jawa Barat</p>
                </div>
                <div class="flex justify-between">
                    <h4 class="font-bold">Catatan :</h4>
                    <p class="text-[#828282]">Sampah Sudah Ready</p>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
