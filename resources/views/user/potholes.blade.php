@extends('layouts.neptune')

@section('appheader')
    @include('components.header')
@endsection

@section('styles')
<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet" >
@endsection

@section('appcontent')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-description">
                    <h1>Potholes</h1>
                    @can('admin')
                    <span>Here you can view, approve/reject, all the potholes that have been reported by the users. </span>
                    @else
                    <span>Here you can view all the potholes that you have reported. </span>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pothole reported by users</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        {{-- <th>Verificator</th> --}}
                                        <th>%</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($potholes as $pothole)
                                    @if($pothole->id_user == Auth::id())
                                        <tr>
                                            <td>{{ $pothole->updated_at }}</td>
                                            <td>{{ $pothole->lat }}</td>
                                            <td>{{ $pothole->long }}</td>
                                            <td>{{ $pothole->desc }}</td>
                                            <td>
                                                @if($pothole->is_damaged)
                                                    <span class="badge badge-danger">Damaged</span>
                                                @else
                                                    <span class="badge badge-success">Not Damaged</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pothole->is_damaged)
                                                    {{ $pothole->damage_percentage }}%
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <div class="invoice-info-actions">
                                                    <button type="button" class="btn btn-info view-image" data-image="{{ $pothole->is_damaged ? $pothole->getSegmentedImageAttribute() : Storage::url($pothole->image) }}" data-toggle="tooltip" data-placement="top" title="Preview the Image"><i class="material-icons">image</i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice-info-actions">
                                                    <button type="button" class="btn btn-primary view-location" data-lat="{{ $pothole->lat }}" data-lng="{{ $pothole->long }}" data-toggle="tooltip" data-placement="top" title="View Location"><i class="material-icons">place</i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        {{-- <th>Verificator</th> --}}
                                        <th>%</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Pothole Image</h5>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" alt="Pothole Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<!-- Modal for displaying the map -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Pothole Location</h5>
            </div>
            <div class="modal-body">
                <div id="potholeMap" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('pagescripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="../../assets/plugins/datatables/datatables.min.js"></script>
<script src="../../assets/js/pages/datatables.js"></script>
<script>
// Fungsi untuk menampilkan gambar saat tombol "V" ditekan
    document.querySelectorAll('.view-image').forEach(button => {
        button.addEventListener('click', function() {
            // Ambil alamat gambar dari atribut data
            const imageUrl = this.dataset.image;
            // Tampilkan gambar di dalam modal
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
            // Tampilkan modal
            $('#imageModal').modal('show');
        });
    });
</script>
<script>
    // Siapkan peta Leaflet
    const potholeMap = L.map('potholeMap').setView([0, 0], 15); // Koordinat default diatur ke (0, 0)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(potholeMap);

    // Fungsi untuk menampilkan peta saat tombol "View Location" ditekan
    document.querySelectorAll('.view-location').forEach(button => {
        button.addEventListener('click', function() {
            const lat = parseFloat(this.dataset.lat); // Ambil latitude dari atribut data
            const lng = parseFloat(this.dataset.lng); // Ambil longitude dari atribut data
            // Atur posisi marker
            L.marker([lat, lng]).addTo(potholeMap).bindPopup('Pothole Location').openPopup();
            potholeMap.setView([lat, lng], 15);
            // Tampilkan modal
            $('#mapModal').modal('show');
        });
    });
</script>


@endsection
