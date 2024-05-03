@extends('layouts.neptune')


@section('appheader')
    @include('components.header')
@endsection


@section('appcontent')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Potholes</h1>
                        <span>Here you can view, approve/reject, all the potholes that have been reported by the users.
                        </span>
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
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Reporter</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($potholes as $pothole)
                                        <tr>
                                            <td>{{ $pothole->user->name }}</td>
                                            <td>{{ $pothole->lat }}</td>
                                            <td>{{ $pothole->long }}</td>
                                            <td>{{ $pothole->address }}</td>
                                            <td>{{ $pothole->desc }}</td>
                                            <td>
                                                {{-- <span class="badge badge-success">Verified</span> --}}
                                                <span class="badge badge-danger">Unverified</span>
                                            <td>
                                                <div class="invoice-info-actions">
                                                    <button type="button" class="btn btn-info view-image"
                                                        data-image="{{ $pothole->is_damaged ? $pothole->getSegmentedImageAttribute() : Storage::url($pothole->image) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Preview the Image"><i
                                                            class="material-icons">image</i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <form id="deleteForm{{ $pothole->id }}"
                                                    action="{{ route('admin.admin-potholes.update', $pothole->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="btn btn-success acc-pothole"
                                                        data-toggle="tooltip" data-placement="top" title="Delete">Y</button>
                                                </form>
                                                <div class="invoice-info-actions">
                                                    <form id="deleteForm{{ $pothole->id }}"
                                                        action="{{ route('admin.admin-potholes.destroy', $pothole->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger reject-pothole"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Delete">N</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Reporter</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
        </div>
    </div>
@endsection

@section('pagescripts')
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
        // Fungsi untuk mengkonfirmasi penghapusan pothole
        document.querySelectorAll('.reject-pothole').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan aksi default dari form

                const confirmation = window.confirm('Apakah Anda yakin ingin menolak pothole ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });

        document.querySelectorAll('.acc-pothole').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan aksi default dari form

                const confirmation = window.confirm('Apakah Anda yakin ingin menyetujui pothole ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });
    </script>
@endsection
