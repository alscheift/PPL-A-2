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
                        <h1>Admin Dashboard</h1>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('pagescripts')
{{-- <script src="../../assets/js/pages/dashboard.js"></script> <!-- Example --> --}}
@endsection