{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lokasi Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d3b2ed7825.js" crossorigin="anonymous"></script>
  <style>
    #map {
      height: 500px;
      width: 100%;
      border-radius: 0.5rem;
    }
  </style>
</head> --}}
@extends('layouts.userLayout')

@section('content')
    <body class="bg-gray-100">
        @include('component.navbar')

        <div class="pt-16">
            <div class="container mx-auto py-8">
                <h1 class="mb-4 text-center text-3xl font-bold text-green-800">Lokasi Toko Kami</h1>
                <p class="mb-8 text-center text-gray-700">Temukan lokasi toko kami dengan mudah menggunakan peta interaktif
                    di bawah ini.</p>
                <div id="map" class="mx-auto shadow-lg"></div>
            </div>
        </div>

        
        <!-- Footer -->
        <footer class="mt-8 bg-white shadow-md">
            @include('component.footer')
        </footer>
        
        <script>
            function initMap() {
                const tokoLocations = [{
                        lat: -7.286587,
                        lng: 112.781530,
                        title: "Toko Surabaya"
                    },
                    {
                        lat: -7.797068,
                        lng: 110.370529,
                        title: "Toko Yogyakarta"
                    },
                    {
                        lat: -6.208763,
                        lng: 106.845599,
                        title: "Toko Jakarta"
                    },
                    {
                        lat: -8.670458,
                        lng: 115.212629,
                        title: "Toko Bali"
                    },
                ];

                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 8,
                    center: tokoLocations[0],
                });

                tokoLocations.forEach((location) => {
                    new google.maps.Marker({
                        position: {
                            lat: location.lat,
                            lng: location.lng
                        },
                        map: map,
                        title: location.title,
                    });
                });
            }
        </script>

        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmp_hSrcaIL4AU-WfruH57C_NgjuL41fA&callback=initMap">
        </script>
    </body>
@endsection
