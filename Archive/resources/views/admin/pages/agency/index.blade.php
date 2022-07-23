@extends('admin.layouts.app')
@section('title', 'Agencies')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Agencies</h1>
                            <span>You're showing the agencies.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Agency List</h5>
                            </div>
                            <div class="card-body">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('admin.scripts.datatables')
    {!! $dataTable->scripts() !!}
@endsection
