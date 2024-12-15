@extends('admin.layouts.layout')
@section('content')
    <section>
        <main class="h-full max-h-screen rounded-xl transition-all duration-200">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 break-words min-h-svh bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border mb-3">
                        <div class="p-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="font-bold" style="font-size: 32px">Create Artikel</h6>
                        </div>
                        <div class="mb-10 px-5">
                            <a href="{{ route('admin.kelolaArtikel') }}"
                                class="focus:outline-none text-white bg-primary font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Kembali</a>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <form class="px-5" action="{{ route('admin.kelolaArtikel.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="title" class="block mb-2 text-sm font-medium">
                                            Title</label>
                                        <input type="text" id="title" name="title"
                                            class="bg-gray-50 border border-gray-300 rounded w-full p-2.5"
                                            placeholder="Masukkan title Anda" value="{{ old('title') }}" />
                                        @error('title')
                                            <div class="text-red-600 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="content" class="block mb-2 text-sm font-medium">
                                            Content</label>
                                        <textarea name="content" id="content" cols="30" rows="10"
                                            class="bg-gray-50 border border-gray-300 rounded w-full p-2.5" placeholder="Masukkan content Anda"
                                            value="{{ old('content') }}"></textarea>
                                        @error('content')
                                            <div class="text-red-600 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="image" class="block mb-2 text-sm font-medium">
                                            Image</label>
                                        <input type="file" id="image" name="image"
                                            class="bg-gray-50 border border-gray-300 rounded w-full p-2.5"
                                            placeholder="Masukkan image Anda" value="{{ old('image') }}" />
                                        @error('image')
                                            <div class="text-red-600 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
