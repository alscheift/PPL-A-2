@extends('layouts.neptune')


@section('appheader')
    @include('components.header')
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
            <div class="col-12">
                    <label for="inputMap" class="form-label">Lokasi Pothole</label>
                    <iframe
                        width="600"
                        height="450"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d960.8388531278873!2d110.93446389404517!3d-7.468099138456474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMjgnMDQuNiJTIDExMMKwNTYnMDMuNyJF!5e0!3m2!1sid!2sid!4v1713495870798!5m2!1sid!2sid">
                    </iframe>
                </div>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputLat" class="form-label">Latitude</label>
                    <input type="text" class="form-control" id="inputLat" value="7.4680279">
                </div>
                <div class="col-md-6">
                    <label for="inputLong" class="form-label">Longitude</label>
                    <input type="text" class="form-control" id="inputLong" value="110.9343136">
                </div>
                <div class="col-12">
                    <label for="inputDesc" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan keterangan terkait kerusakan jalan">
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
@endsection

@section('pagescripts')
{{-- <script src="../../assets/js/pages/dashboard.js"></script>--}}
@endsection
