<!-- Navigation -->
<nav class="fixed w-full bg-blue-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo dan Menu -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img class="h-8 w-auto"
                        src="{{ asset('assets/image/WhatsApp Image 2024-05-01 at 11.37.02_c6c61df6.jpg') }}"
                        alt="Your Company">
                </div>

                <!-- Menu -->
                <div class="ml-4 hidden sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ route('home') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
                        <a href="{{ route('catalog') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Catalog</a>
                        <a href="#"
                            class="px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About
                            Us</a>
                        <a href="#"
                            class="px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                        <a href="{{ route('ourlocation') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Our
                            Location</a>
                    </div>
                </div>
            </div>

            <!-- Tombol Pencarian dan Keranjang -->
            <div class="hidden sm:block">
                <div class="flex items-center">
                    <!-- Tombol Pencarian -->
                    <div class="relative">
                        <input type="text"
                            class="rounded-full bg-gray-800 px-3 py-1 text-gray-300 placeholder-gray-400 focus:outline-none"
                            placeholder="Search...">
                        <button type="button"
                            class="absolute right-0 top-0 mr-2 mt-1 text-gray-400 hover:text-white focus:outline-none">
                        </button>
                    </div>

                    <!-- Tombol Keranjang -->
                    <div class="ml-4">
                        <a href="{{ route('cart') }}" class="text-gray-300 hover:text-white">
                            <span style='font-size:20px;'>&#128722;</span>
                        </a>
                    </div>

                    <div class="ml-4">
                        @auth
                            <!-- Jika Login -->
                            <div class="flex items-center">
                                <span class="text-gray-300">Hello, {{ Auth::user()->name }}</span>
                                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                                    @csrf
                                    <button type="submit"
                                        class="text-gray-300 hover:text-white focus:outline-none">Logout</button>
                                </form>
                            </div>
                        @else
                            <!-- Jika Belum Login -->
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">
                                <span style='font-size:20px;'>&#128100;</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
