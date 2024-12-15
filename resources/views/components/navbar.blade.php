<header>
    <nav class="flex justify-between items-center w-[92%] mx-auto px-10">
        <div>
            <a href="{{ route('user.index') }}">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="lg:max-w-52 max-w-40">
            </a>
        </div>
        <div
            class="nav-links z-10 md:static absolute bg-white lg:bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] w-full md:w-auto flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:justify-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-primary" href="{{ route('user.blog') }}">Artikel</a>
                </li>
                <li class="relative">
                    <button class="outline-none focus:outline-none hover:text-primary" id="menu-btn">
                        Layanan
                    </button>
                    <div class="lg:absolute hidden bg-white right-[-8] rounded-md p-2 border border-slate-300 w-40 mt-3 z-10"
                        id="dropdown">
                        <ul class="spac-y-2">
                            <li>
                                <a href="{{ route('user.penukaranSampah') }}"
                                    class="flex p-2 text-gray-600 rounded-md hover:text-primary">Tukar
                                    Sampah</a>
                            </li>
                            <li>
                                <a href="{{ route('user.penukaranPoin') }}"
                                    class="flex p-2 text-gray-600 rounded-md hover:text-primary">Tukar
                                    Poin</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="hover:text-primary" href="{{ route('user.kontak') }}">Kontak</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6 z-50">
            @auth
                <div class="relative" id="dropdownButton">
                    <div onclick="toggleDropdown()"
                        class="border-solid border-primary border-[2px] px-5 py-2 rounded-lg cursor-pointer font-bold flex justify-between items-center bg-white shadow-sm">
                        <p class="text-primary">
                            {{ auth()->user()->username }} <i class="fa-solid fa-user fa-lg ml-5"></i>
                        </p>
                    </div>
                    <div class="rounded border-[2px] border-primary bg-white absolute top-[50px] shadow-md hidden w-[200px]"
                        id="dropdown">
                        @if (auth()->user()->hasRole('administrator'))
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('admin.index') }}"><i class="fa-solid fa-gauge fa-lg"></i> Dashboard</a>
                            </div>
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('user.profile', auth()->user()->id) }}"><i
                                        class="fa-solid fa-user fa-lg"></i>
                                    Profile</a>
                            </div>
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('user.penukaranPoin') }}"><i class="fa-solid fa-hand-point-up fa-lg"></i>
                                    Tukar
                                    Poin</a>
                            </div>
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket fa-lg"></i>
                                    Logout</a>
                            </div>
                        @else
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('user.profile', auth()->user()->id) }}"><i
                                        class="fa-solid fa-user fa-lg"></i>
                                    Profile</a>
                            </div>
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('user.penukaranPoin') }}"><i class="fa-solid fa-hand-point-up fa-lg"></i>
                                    Tukar
                                    Poin</a>
                            </div>
                            <div class="cursor-pointer hover:bg-primary p-4 hover:text-white">
                                <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket fa-lg"></i>
                                    Logout</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                    class="border-2 border-primary bg-primary text-white lg:px-5 lg:py-2 cursor-pointer rounded-lg px-2 py-1 text-sm lg:text-lg">Masuk</a>
                <a href="{{ route('register') }}"
                    class="border-2 border-primary lg:px-5 lg:py-2 cursor-pointer rounded-lg px-2 py-1 text-sm lg:text-lg">Daftar</a>
                <ion-icon onclick="onToggleMenu(this)" name="menu-outline"
                    class="text-3xl cursor-pointer md:hidden"></ion-icon>
            @endguest

        </div>
    </nav>
</header>
<script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
        e.name = e.name === 'close' ? 'menu' : 'close'
        navLinks.classList.toggle('top-[7%]')
    }
</script>
<script>
    window.addEventListener("DOMContentLoaded", () => {
        const menuBtn = document.querySelector("#menu-btn")
        const dropdown = document.querySelector("#dropdown")

        menuBtn.addEventListener("click", () => {
            dropdown.classList.toggle("hidden");
            dropdown.classList.toggle("flex");
        })
    })
</script>
<script>
    function toggleDropdown() {
        let dropdown = document.querySelector('#dropdownButton #dropdown');
        dropdown.classList.toggle('hidden')
    }
</script>
