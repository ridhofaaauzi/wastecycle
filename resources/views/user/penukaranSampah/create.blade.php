@extends('layouts.layout')

@section('title')
    Pickup Page
@endsection

@section('content')
    @include('components.navbar')
    <section class="p-6">
        <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Pickup</h2>
        <p class="mb-4 text-sm text-gray-900 text-center max-w-lg mx-auto">
            Tukarkan sampahmu dengan kebaikan. Layanan pickup kami akan mengambil sampahmu dan mengubahnya menjadi sesuatu
            yang berarti.
        </p>
        <div class="mx-auto max-w-2xl border border-[#dcdcdc] rounded-lg p-6">
            <form id="pickupForm" action="{{ route('user.penukaranSampah.store', $waste->id) }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="tanggal_pengambilan" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            Pengambilan</label>
                        <input type="date" name="tanggal_pengambilan" id="tanggal_pengambilan"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            required>
                        @error('tanggal_pengambilan')
                            <div class="text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="berat_sampah" class="block mb-2 text-sm font-medium text-gray-900">Berat Sampah</label>
                        <input type="number" name="berat_sampah" id="berat_sampah" placeholder="Masukkan Berat Sampah Anda"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-2"
                            required>
                        @error('berat_sampah')
                            <div class="text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900">Catatan</label>
                        <textarea id="catatan" name="catatan" rows="8"
                            class="w-full border-2 border-[#dcdcdc] rounded-lg opacity-65 focus:outline-none focus:border-primary focus:ring-primary p-5"
                            placeholder="Masukkan Catatan Anda" required></textarea>
                        @error('catatan')
                            <div class="text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" id="submitBtn" disabled
                        class="w-full items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-400 rounded-lg focus:ring-4">Simpan</button>
                </div>
            </form>
        </div>
    </section>
    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('pickupForm');
            const submitBtn = document.getElementById('submitBtn');
            const inputs = form.querySelectorAll('input, textarea');

            function checkFormValidity() {
                let isValid = true;
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                    }
                });
                submitBtn.disabled = !isValid;
                if (isValid) {
                    submitBtn.classList.remove('bg-gray-400');
                    submitBtn.classList.add('bg-green-500', 'hover:bg-green-600');
                } else {
                    submitBtn.classList.add('bg-gray-400');
                    submitBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', checkFormValidity);
            });
        });
    </script>
@endsection
