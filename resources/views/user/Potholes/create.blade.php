@extends('layouts.neptune')

@section('appheader')
    @include('components.header')
@endsection

@section('styles')
<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet" >
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('appcontent')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Form Laporan Pothole</h1>
                    </div>
                </div>
            </div>
                <form method='POST' action="{{Route('potholes.store')}}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="inputMap" class="form-label">Lokasi Pothole</label>
                        <div id="map" style="height: 300px; width: 100%;"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="lat" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="lat" id="lat" placeholder="Klik lokasi pada peta" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="long" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="long" id="long" placeholder="Klik lokasi pada peta" readonly>
                    </div>
                    <div class="col-12">
                        <label for="desc" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Akan mengisi alamat secara otomatis" readonly>
                    </div>
                    <div class="col-12">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Silakan tambahkan keterangan tentang kerusakan jalan" required>
                    </div>
                    <div class="col-12">
                        <label for="inputLat" class="form-label">Upload Gambar</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Berhasil mengirimkan laporan</h5>
                    <button type="button" class="close" id="closeSuccessModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if($latestPothole)
                <div class="modal-body">
                    <p><strong>Latitude:</strong> {{ $latestPothole->lat }}</p>
                    <p><strong>Longitude:</strong> {{ $latestPothole->long }}</p>
                    <p><strong>Alamat:</strong> {{ $latestPothole->address }}</p>
                    <p><strong>Deskripsi:</strong> {{ $latestPothole->desc }}</p>
                    <p><strong>Kondisi:</strong> 
                        @if($latestPothole->is_damaged)
                            <span class="badge badge-danger">Rusak</span>
                        @else
                            <span class="badge badge-success">Tidak Rusak</span>
                        @endif
                    </p>
                    {{-- <p><strong>Presentase Kerusakan:</strong>
                        @if($latestPothole->is_damaged)
                            {{ $latestPothole->damage_percentage }}%
                        @else
                            -
                        @endif
                    </p> --}}
                    <p><strong>Image:</strong></p>
                    <img src="{{ $latestPothole->is_damaged ? $latestPothole->getSegmentedImageAttribute() : Storage::url($latestPothole->image) }}" alt="Uploaded Image" style="max-width: 100%; max-height: 200px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">Close</button>
                </div>
                <script>
                    document.getElementById('closeButton').addEventListener('click', function() {
                        $('#successModal').modal('hide');
                    });
                    // Menutup modal saat tombol close pada header modal ditekan
                    document.getElementById('closeSuccessModal').addEventListener('click', function() {
                        $('#successModal').modal('hide');
                    });
                </script>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('pagescripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Fungsi untuk mengambil alamat dari Nominatim API berdasarkan koordinat
        function getAddressFromCoordinates(lat, lon) {
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name; // Ambil alamat dari respons JSON
                    // Isi deskripsi pada formulir dengan alamat yang ditemukan
                    document.getElementById('address').value = address;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Inisialisasi peta
        var map = L.map('map').setView([-7.4680279, 110.9343136], 13);

        // Icon
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Tambahkan layer peta OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var previousMarker = null;

        // Penangan klik pada peta
        function onMapClick(e) {
            if (previousMarker !== null) {
                map.removeLayer(previousMarker);
            }
            var marker = L.marker(e.latlng, {icon: redIcon }).addTo(map);
            var inputLat = document.getElementById('lat');
            var inputLong = document.getElementById('long');
            inputLat.value = e.latlng.lat;
            inputLong.value = e.latlng.lng;

            getAddressFromCoordinates(e.latlng.lat, e.latlng.lng); // Panggil fungsi untuk mengambil alamat
            previousMarker = marker;
        }

        map.on('click', onMapClick);
    </script>
    <script>
        $(document).ready(function(){
            // Cek jika terdapat parameter 'success' pada URL
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('success');
            // Jika terdapat parameter 'success' dan nilainya 'true', tampilkan modal
            if (successParam && successParam === 'true') {
                $('#successModal').modal('show');
            }
        });
    </script>
    
@endsection