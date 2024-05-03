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
                    <h1>Users</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">List of Unverified Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Verification Status</th>
                                        <th>Verify User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->is_verified)
                                                    <span class="badge badge-success">Verified</span>
                                                    @else
                                                    <span class="badge badge-danger">Unverified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form id="verifyForm{{ $user->id }}" action="{{ route('admin.users.verify', $user->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @if($user->is_verified)
                                                    <button type="button" class="btn btn-warning verify-user" data-toggle="tooltip" data-placement="top" title="Verify">Unverify</button>
                                                    @else
                                                    <button type="button" class="btn btn-success verify-user" data-toggle="tooltip" data-placement="top" title="Verify">Verify</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>

                                {{-- <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Description</th>
                                        <th>Status</th> --}}
                                        {{-- <th>Verificator</th> --}}
                                        {{-- <th>%</th>
                                        <th>Verified</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
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
    // deletion modal
    document.querySelectorAll('.verify-user').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin ingin mengganti status verifikasi dari user ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
</script>

@endsection
