@extends('layouts.userLayout')

@section('content')

    <body class="flex min-h-screen flex-col">

        @include('component.navbar')

        <p class="mt-4 text-center text-2xl font-bold">Happy Shopping</p>
        <div class="flex-grow">
            <div
                class="hover mx-auto mt-10 grid grid-cols-1 justify-center gap-4 pl-8 pr-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($produks as $item)
                    <div class='card w-full bg-gray-200 shadow-xl'>
                        <figure>
                            <img src='{{ asset('storage/' . $item->gambar) }}' alt='Cookies' class='h-48 w-full rounded-xl object-cover'>
                        </figure>
                        <div class='card-body items-center text-center'>
                            <h5 class='card-title font-bold'>Rp{{ number_format($item->harga, 0, ',', '.') }}</h5>
                            <h4 class='card-title font-bold'>{{ $item->nama }}</h4>
                            <button
                                class='btn btn-primary rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700'
                                onclick='addToCart()'>
                                Add to cart
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <footer class="mt-8 bg-white shadow-md">
            @include('component.footer')
        </footer>

        <script src="https://kit.fontawesome.com/d3b2ed7825.js" crossorigin="anonymous"></script>
        <script>
            function addToCart() {
                alert('Product added to cart!');
            }
        </script>
    </body>

    </html>
@endsection
