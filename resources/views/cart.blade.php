@extends('layouts.userLayout')

@section('content')

    <body class="flex min-h-screen flex-col bg-gray-100">
        @include('component.navbar')
        <div class="container mx-auto mt-20 flex-1">
            <div class="rounded-lg bg-white p-8 shadow-lg">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Shopping Cart</h2>

                <div class="flex items-center border-b border-gray-300 py-4">
                    <img src="/assets/image/tradisional.jpeg" alt="Molen" class="mr-4 h-auto w-24 rounded-md shadow-md">
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800">Molen</h3>
                        <p class="text-gray-600">Rp. 3,000</p>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4">
                            <button class="rounded bg-gray-200 px-2 py-1 text-gray-700"
                                onclick="decrementQuantity(this)">-</button>
                            <input type="number" value="1" min="1" max="99"
                                class="mx-2 w-12 rounded border border-gray-300 text-center">
                            <button class="rounded bg-gray-200 px-2 py-1 text-gray-700"
                                onclick="incrementQuantity(this)">+</button>
                        </div>
                        <div class="text-lg font-bold text-gray-800">Rp. 20,000</div>
                        <button class="ml-4 text-red-500" onclick="removeCartItem(this)">Remove</button>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-between">
                    <div class="text-2xl font-bold text-gray-800">Subtotal: Rp. 70,000</div>
                    <button class="rounded-md bg-green-500 px-4 py-2 text-white hover:bg-green-600">Checkout</button>
                </div>
            </div>
        </div>

        <footer class="mt-8 bg-white shadow-md">
            @include('component.footer')
        </footer>

        <script>
            function incrementQuantity(button) {
                const input = button.parentElement.querySelector('input[type="number"]');
                let value = parseInt(input.value);
                input.value = isNaN(value) ? 1 : value + 1;
            }

            function decrementQuantity(button) {
                const input = button.parentElement.querySelector('input[type="number"]');
                let value = parseInt(input.value);
                input.value = isNaN(value) || value < 2 ? 1 : value - 1;
            }

            function removeCartItem(button) {
                const cartItem = button.closest('.flex');
                cartItem.remove();
            }
        </script>
    </body>

    </html>
@endsection
