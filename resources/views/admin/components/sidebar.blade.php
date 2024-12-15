   <!-- sidenav  -->
   <aside class="max-w-62.5 bg-white shadow-sm min-h-svh w-[400px]">
       <div class="h-19.5">
           <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-primary font-bold"
               href="{{ route('user.index') }}" style="font-size: 24px">
               WasteCyle
           </a>
       </div>
       <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
           <ul class="flex flex-col pl-0">
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.index') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.index') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.kelolaUser') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.kelolaUser') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola User</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.kelolaArtikel') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.kelolaArtikel') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola Artikel</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.kelolaSampah') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.kelolaSampah') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola Sampah</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.kelolaPoin') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.kelolaPoin') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola Poin</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.penukaranSampah') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.penukaranSampah') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola Penukaran
                           <br />Sampah</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg {{ request()->routeIs('admin.penukaranPoin') ? 'bg-primary text-white' : '' }} px-4 font-semibold"
                       href="{{ route('admin.penukaranPoin') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kelola Penukaran
                           <br />Poin</span>
                   </a>
               </li>
               <li class="mt-0.5 w-full mb-4">
                   <a class="py-2.7 my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold"
                       href="{{ route('logout') }}">
                       <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Logout</span>
                   </a>
               </li>
           </ul>
       </div>
   </aside>
   <!-- end sidenav -->
