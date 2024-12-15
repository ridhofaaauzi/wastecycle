<footer>
    <div class="bg-[#CFEDE1] w-full h-fit lg:h-[294px] p-6">
        <div class="flex justify-between items-center w-[92%] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <div>
                    <ul class="flex flex-col justify-between gap-5">
                        <li>
                            <a href="{{ route('user.index') }}">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="w-64">
                            </a>
                        </li>
                        <li>
                            <p class="text-lg max-w-lg">
                                WasteCycle ini merupakan platform untuk melakukan pertukaran sampah
                            </p>
                        </li>
                        <li>
                            <p class="text-sm">
                                All rights reserved. Powered by WasteCycle
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="mt-10 lg:ml-28 ml-0">
                    <ul class="flex flex-col justify-between gap-5">
                        <li>
                            <h4 class="text-lg font-bold">Layanan</h4>
                        </li>
                        <li>
                            <a href="{{ route('user.blog') }}" class="text-md">Artikel</a>
                        </li>
                        <li>
                            <a href="{{ route('user.penukaranSampah') }}" class="text-md">Tukar Sampah</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-10 lg:ml-28 ml-0">
                    <ul class="flex flex-col justify-between gap-5">
                        <li>
                            <h4 class="text-lg font-bold">About</h4>
                        </li>
                        <li>
                            <a href="{{ route('user.kontak') }}" class="text-md">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-10 lg:ml-28 ml-0">
                    <ul class="flex flex-col justify-between gap-5">
                        <li>
                            <h4 class="text-lg font-bold">Sosial Media</h4>
                        </li>
                        <li class="flex gap-10">
                            <a href="https://www.instagram.com/waste.cyclee/" target="_blank">
                                <i class="fa-brands fa-instagram fa-2xl"></i>
                            </a>
                            <a href="https://www.tiktok.com/@waste.cycle?lang=en" target="_blank">
                                <i class="fa-brands fa-tiktok fa-2xl"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
