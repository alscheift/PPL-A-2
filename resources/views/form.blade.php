@extends('layouts.neptune')

@section('appheader')
    @include('components.header')
@endsection

@section('styles')
<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet" >
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
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputMap" class="form-label">Lokasi Pothole</label>
                        <div id="map" style="height: 300px; width: 100%;"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLat" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="inputLat" placeholder="Klik lokasi pada peta" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLong" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="inputLong" placeholder="Klik lokasi pada peta" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputDesc" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan keterangan terkait kerusakan jalan">
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <label for="inputLat" class="form-label">Upload Gambar</label>
                        <div class="card">
                            <div class="card-body">
                                <div id="dropzone">
                                    <form action="/upload" class="dropzone needsclick" id="demo-upload">
                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button"><strong>Drop files here or click to upload.</strong></button><br />
                                            <span class="note needsclick">(Pastikan format gambar sesuai)</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.4680279, 110.9343136], 13);

        // Tambahkan layer peta OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Penangan klik pada peta
        function onMapClick(e) {
            alert("Anda mengklik pada posisi: " + e.latlng);
            var marker = L.marker(e.latlng).addTo(map);
            var inputLat = document.getElementById('inputLat');
            var inputLong = document.getElementById('inputLong');
            inputLat.value = e.latlng.lat;
            inputLong.value = e.latlng.lng;
        }

        map.on('click', onMapClick);
    </script>
@endsection