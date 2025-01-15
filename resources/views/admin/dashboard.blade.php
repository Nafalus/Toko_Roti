@extends('layouts.userLayout')

@section('content')

    <body class="bg-gray-100">
        <div class="flex h-screen bg-gray-200">
            @include('component.sidebar')

            <!-- Main content -->
            <div class="flex flex-1 flex-col overflow-hidden">
                <header class="flex items-center justify-between border-b-4 border-green-800 bg-white px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-700">Selamat datang, {{ Auth::user()->name }}</h1>
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

                <!-- Main content area -->
                <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
                    <!-- Form tambah jenis kue -->
                    <div class="mx-auto mt-8 max-w-md">
                        <div class="rounded-lg bg-white p-8 shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-700">Tambah Jenis Kue</h3>
                            <form action="{{ route('jenis_kue.store') }}" method="POST" enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kue:</label>
                                    <input type="text" name="nama" id="nama"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                </div>
                                <div>
                                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar
                                        Kue:</label>
                                    <input type="file" name="gambar" id="gambar" accept="image/*"
                                        class="mt-1 block w-full text-gray-300">
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>

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


                    <!-- Grid Jenis Kue -->
                    <div class="mx-auto mt-8 max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-700">Jenis Kue</h3>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($jenisKue as $jenis)
                                <div class="rounded-lg bg-white p-6 shadow-lg">
                                    <img src="{{ asset('storage/' . $jenis->gambar) }}" alt="Gambar Kue"
                                        class="h-40 w-full rounded-t-lg object-cover">
                                    <div class="mt-4">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ $jenis->nama }}</h4>
                                        <div class="mt-4 flex items-center justify-between">
                                            <form action="{{ route('jenis_kue.destroy', $jenis->id) }}" method="POST"
                                                onsubmit="return confirm('Anda yakin ingin menghapus jenis kue ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-700 focus:outline-none">Hapus</button>
                                            </form>
                                            <button onclick="openUpdateForm({{ $jenis->id }}, '{{ $jenis->nama }}')"
                                                class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Form update jenis kue (pop-up/modal) -->
                    <div id="updateFormContainer"
                        class="fixed inset-0 hidden items-center justify-center bg-gray-600 bg-opacity-50">
                        <div class="mx-auto max-w-md rounded-lg bg-white p-8 shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-700">Update Jenis Kue</h3>
                            <form id="updateForm" action="" method="POST" enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_jenis" id="update_id_jenis">
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kue:</label>
                                    <input type="text" name="nama" id="update_nama"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 p-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                </div>
                                <div>
                                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar
                                        Kue:</label>
                                    <input type="file" name="gambar" id="update_gambar" accept="image/*"
                                        class="mt-1 block w-full text-gray-300">
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Update</button>
                                </div>
                            </form>
                            <button onclick="closeUpdateForm()"
                                class="mt-4 inline-flex w-full justify-center rounded-md border border-transparent bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">Cancel</button>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script>
            function openUpdateForm(id, name) {
                document.getElementById('updateFormContainer').classList.remove('hidden');
                document.getElementById('updateForm').action = `/jenis-kue/update/${id}`;
                document.getElementById('update_id_jenis').value = id;
                document.getElementById('update_nama').value = name;
            }

            function closeUpdateForm() {
                document.getElementById('updateFormContainer').classList.add('hidden');
            }
        </script>
    </body>
@endsection
