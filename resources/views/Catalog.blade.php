<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Jenis Kue</title>
</head>

<body class="flex min-h-screen flex-col">
    @include('component.navbar')

    <p class="mt-4 text-center text-2xl font-bold">Happy Shopping</p>
    <div class="flex-grow">
        <div class="mt-16 flex-grow">
            <div
                class="mx-auto mt-10 grid grid-cols-1 justify-center gap-4 pl-8 pr-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($jenisRotis as $jenisRoti)
                    <a href="{{ route('catalog.show', ['id' => $jenisRoti->id]) }}" class='card bg-base-100 w-full shadow-xl'>
                        <figure>
                            <img src="{{ asset('storage/' . $jenisRoti->gambar) }}" alt="Cookies"
                                class="h-48 w-full rounded-xl object-cover" style="cursor: pointer;">
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class='card-title text-lg font-bold'>{{ $jenisRoti->nama }}</h2>
                            <div class='card-actions'></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="mt-8 bg-white shadow-md">
        @include('component.footer')
    </footer>

    <script src="https://kit.fontawesome.com/d3b2ed7825.js" crossorigin="anonymous"></script>
    <script></script>
</body>

</html>
