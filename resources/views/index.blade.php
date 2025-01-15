@extends('layouts.userLayout')

@section('content')

    <body class="bg-gray-100">
        @include('component.navbar')

        <!-- Image Section -->
        <div class="pt-16">
            <div class="container mx-auto flex flex-wrap justify-center py-8">
                <div class="w-full p-2 md:w-1/4">
                    <img src="{{ asset('assets/image/produk/45e2840fa111763eabe6cfd83b561535.jpg') }}" alt="Product Image 1"
                        class="w-full rounded-lg shadow-lg">
                </div>
                <div class="w-full p-2 md:w-1/4">
                    <img src="../assets/image/produk/f2554052524946b15996540517849e67.jpg" alt="Product Image 2"
                        class="w-full rounded-lg shadow-lg">
                </div>
                <div class="w-full p-2 md:w-1/4">
                    <img src="../assets/image/produk/kuecubit.jpg" alt="Product Image 3"
                        class="w-full rounded-lg shadow-lg">
                </div>
                <div class="w-full p-2 md:w-1/4">
                    <img src="../assets/image/produk/cookies.jpg" alt="Product Image 4" class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Raja Pesanan</h1>
                    <p>Ini Toko berpengalaman menangani pesanan roti dalam jumlah besar (hingga 35.000 item sehari)
                        sejak 2010. Berapapun jumlah pesanan Anda, Kami layani.</p>
                </div>
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Fresh from Oven</h1>
                    <p>Seluruh produk pesanan selalu dibuat paling lama 24 jam sebelum waktu pengambilan pesanan. Roti
                        kami tahan 2-3 hari dari pembelian Anda di outlet Laritta</p>
                </div>
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Varian Terbanyak</h1>
                    <p>Ini Toko menyediakan lebih dari 243 varian produk. Kami juga secara rutin menambah varian produk
                        baru kami tiap beberapa bulan.</p>
                </div>
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Gratis Antar</h1>
                    <p>Ini Toko menyediakan layanan antar pesanan dalam kota (Surabaya & Sidoarjo), hingga ke luar kota
                        kota (Malang, Batu, Gresik, Pasuruan, Mojokerto, Bangkalan, Sampang, Pamekasan, dan kota lain di
                        Jawa Timur).</p>
                </div>
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Membership</h1>
                    <p>Program keanggotaan (membership) Ini Toko gratis dan menawarkan berbagai keuntungan khusus
                        member.</p>
                </div>
                <div class="rounded-lg bg-gray-200 p-4">
                    <h1 class="mb-2 text-xl font-bold">Jaminan Kualitas</h1>
                    <p>Ini Toko senantiasa menjaga kualitas produk dan layanan untuk pelanggan setia kami. Kami memberi
                        garansi uang kembali hingga 100% jika Anda tidak puas dengan produk atau layanan kami.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-8 bg-white shadow-md">
            @include('component.footer')
        </footer>

        <script src="https://kit.fontawesome.com/d3b2ed7825.js" crossorigin="anonymous"></script>
    </body>
@endsection
