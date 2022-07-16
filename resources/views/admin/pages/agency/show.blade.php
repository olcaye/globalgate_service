@extends('admin.layouts.app')

@section('content')

    <div class="app-content">
        <div class="content-wrapper">
            @include('admin.errors.toast')
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">

                        <a href="{{ route('admin.agency.index') }}" class="text-decoration-none text-success">
                            <div class="d-flex justify-content-start align-items-center mb-lg-3">
                                <i class="material-icons-two-tone">arrow_back</i>
                                <span class="ps-2">Go Back</span>
                            </div>
                        </a>


                        <div class="card widget widget-payment-request">
                            <div class="card-header">
                                <h5 class="card-title">Agency Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-payment-request-container">
                                    <div class="widget-payment-request-info m-t-md">
                                        <div class="widget-payment-request-info-item">
                                            <span class="widget-payment-request-info-title d-block">
                                                Agency Name
                                            </span>
                                            <span class="text-dark d-block">{{ $agency->name }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Phone Number
                                                    </span>
                                            <span class="text-dark d-block">{{ $agency->phone }}</span>
                                        </div>
                                        @isset($submission->whatsapp_number)
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Whatsapp Number
                                                    </span>
                                            <span class="text-dark d-block">{{ $agency->address }}</span>
                                        </div>
                                        @endisset
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Email
                                                    </span>
                                            <span class="text-dark d-block">{{ $agency->email }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Created At
                                                    </span>
                                            <span class="text-dark d-block">{{ $agency->created_at }}</span>
                                        </div>
                                       {{-- <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Status
                                                    </span>

                                        </div>--}}
                                       {{-- <div class="widget-payment-request-info-item">
                                            <button type="button" class="btn btn-outline-success submission-confirm" data-status="Approved" data-id="{{ $agency->id }}">Approve</button>
                                            <button type="button" class="btn btn-outline-danger submission-confirm" data-status="Rejected" data-id="{{ $agency->id }}">Decline</button>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('footer-scripts')
    @include('admin.scripts.submission_show')
@endsection
