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
                        <table id="datatable1" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Verificator</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-70.22</td>
                                    <td>70.22</td>
                                    <td>Jalannya rusak parah</td>
                                    <td>
                                        <span class="badge badge-success">Verified</span>
                                        {{-- <span class="badge badge-danger">Unverified</span> --}}
                                    </td>
                                    <td>admin1</td>
                                    <td>
                                        <div class="invoice-info-actions">
                                            <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Preview the Image">V</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-info-actions">
                                            <a href="#" class="btn btn-primary m-r-xs" type="button" data-toggle="tooltip" data-placement="top" title="Edit">E</a>
                                            <a href="#" class="btn btn-danger m-l-xs" type="button" data-toggle="tooltip" data-placement="top" title="Delete">D</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>-22.70</td>
                                    <td>22.70</td>
                                    <td>Jalannya rusak sedang</td>
                                    <td>
                                        {{-- <span class="badge badge-success">Verified</span> --}}
                                        <span class="badge badge-danger">Unverified</span>
                                    </td>
                                    <td>admin1</td>
                                    <td>
                                        <div class="invoice-info-actions">
                                            <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Preview the Image">V</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-info-actions">
                                            <a href="#" class="btn btn-primary m-r-xs" type="button" data-toggle="tooltip" data-placement="top" title="Edit">E</a>
                                            <a href="#" class="btn btn-danger m-l-xs" type="button" data-toggle="tooltip" data-placement="top" title="Delete">D</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Verificator</th>
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
@endsection

@section('pagescripts')
<script src="../../assets/plugins/datatables/datatables.min.js"></script>
<script src="../../assets/js/pages/datatables.js"></script>
@endsection