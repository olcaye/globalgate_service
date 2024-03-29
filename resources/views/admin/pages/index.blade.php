@extends('admin.layouts.app')
@section('title', 'Submissions')
@section('content')
    <div class="app-content">
        @include('alerts.status')
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Submissions</h1>
                            <span>You're showing the submissions.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">List of Submissions</h5>
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
