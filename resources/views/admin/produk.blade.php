@extends('layouts.userLayout')

@section('content')

    <body class="bg-gray-100">
        <div class="flex h-screen bg-gray-200">
            @include('component.sidebar')

            <!-- Main content -->
            <div class="flex flex-1 flex-col overflow-hidden">
                <header class="flex items-center justify-between border-b-4 border-green-800 bg-white px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-700">Selamat datang,</h1>
                    </div>
                    <div class="flex items-center">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit"
                                class="cursor-pointer border-none bg-transparent font-medium text-gray-700 hover:text-green-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </header>

                <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
                    <!-- Form tambah produk -->
                    <div class="mx-auto mt-8 max-w-md">
                        <div class="rounded-lg bg-white p-8 shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-700">Tambah Produk</h3>
                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                        Produk:</label>
                                    <input type="text" name="nama" id="nama"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        required>
                                </div>
                                <div>
                                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga
                                        Produk:</label>
                                    <input type="number" name="harga" id="harga"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar
                                        Produk:</label>
                                    <input type="file" name="gambar" id="gambar" accept="image/*"
                                        class="mt-1 block w-full">
                                </div>
                                <div>
                                    <label for="jenis_id" class="block text-sm font-medium text-gray-700">Jenis
                                        Produk:</label>
                                    <select name="jenis_id" id="jenis_id"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">-- Pilih Jenis Produk --</option>
                                        @foreach ($jenis as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Pesan sukses dan error -->
                    @if (session('success'))
                        <div class="mx-auto mt-4 max-w-md rounded-lg bg-green-100 px-4 py-3 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mx-auto mt-4 max-w-md rounded-lg bg-red-100 px-4 py-3 text-red-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Daftar produk -->
                    <div class="mx-auto mt-8 max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-700">Daftar Produk</h3>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($produks as $produk)
                                <div class="rounded-lg bg-white p-6 shadow-lg">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk"
                                        class="h-40 w-full rounded-t-lg object-cover">
                                    <div class="mt-4">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ $produk->nama }}</h4>
                                        <p class="text-gray-600">Harga: Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                        </p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-700">Hapus</button>
                                            </form>
                                            <button
                                                onclick="openUpdateForm({{ $produk->id }}, '{{ $produk->nama }}', {{ $produk->harga }}, '{{ $produk->jenis_id }}')"
                                                class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Form update produk (modal) -->
                    <div id="updateFormContainer"
                        class="fixed inset-0 hidden items-center justify-center bg-gray-600 bg-opacity-50">
                        <div class="mx-auto max-w-md rounded-lg bg-white p-8 shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-700">Update Produk</h3>
                            <form id="updateForm" action="" method="POST" enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="update_id">
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                        Produk:</label>
                                    <input type="text" name="nama" id="update_nama"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga
                                        Produk:</label>
                                    <input type="number" name="harga" id="update_harga"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="jenis_id" class="block text-sm font-medium text-gray-700">Jenis
                                        Produk:</label>
                                    <select name="jenis_id" id="update_jenis_id"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @foreach ($jenis as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar
                                        Produk:</label>
                                    <input type="file" name="gambar" id="update_gambar" accept="image/*"
                                        class="mt-1 block w-full">
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">Update</button>
                                </div>
                            </form>
                            <button onclick="closeUpdateForm()"
                                class="mt-4 inline-flex w-full justify-center rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300">Batal</button>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script>
            function openUpdateForm(id, nama, harga, jenis_id) {
                document.getElementById('updateFormContainer').classList.remove('hidden');
                document.getElementById('updateForm').action = `/produk/update/${id}`;
                document.getElementById('update_id').value = id;
                document.getElementById('update_nama').value = nama;
                document.getElementById('update_harga').value = harga;
                document.getElementById('update_jenis_id').value = jenis_id;
            }

            function closeUpdateForm() {
                document.getElementById('updateFormContainer').classList.add('hidden');
            }
        </script>
    </body>
@endsection
