@extends('layouts.layout')
@section('title')
    Home Page
@endsection
@section('content')
    @include('components.navbar')
    <div class="flex flex-col justify-between items-center gap-10 p-6 mt-10">
        <h1 class="text-4xl font-semibold">Penukaran Point</h1>
        <p class="mb-4 text-sm text-gray-900 text-center max-w-lg mx-auto">Tukarkan sampahmu dengan kebaikan. Layanan pickup
            Pointmu dapat ditukar dengan pulsa, e-wallet, token listrik dan voucher minimarket.</p>
        <div class="flex items-center justify-center container mx-auto mb-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-28">
                @foreach ($rewards as $reward)
                    <div class="rounded-xl border p-5 bg-[#F4F4F4] flex flex-col justify-between">
                        <div>
                            <div class="rounded-lg overflow-hidden">
                                <img src="{{ Storage::url($reward->image) }}" alt="" class="aspect-square"
                                    style="width: 250px">
                            </div>
                        </div>
                        <div>
                            <h5 class="text-2xl md:text-3xl font-semibold mt-3">{{ $reward->name }}</h5>
                            <p class="text-[#404040] text-lg mt-3 mb-5">
                                {{ $reward->poin }} Poin
                            </p>
                            <div class="flex w-full">
                                <form action="{{ route('user.penukaranPoin.store', $reward->id) }}" method="POST"
                                    class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="bg-primary w-full p-2 text-white rounded-lg">Tukarkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
