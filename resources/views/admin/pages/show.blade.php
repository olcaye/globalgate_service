@extends('admin.layouts.app')
@section('title', 'Submissions')
@section('content')

    <div class="app-content">
        <div class="content-wrapper">
            @include('admin.errors.toast')
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">

                        <a href="{{ route('admin.submission.index') }}" class="text-decoration-none text-success">
                            <div class="d-flex justify-content-start align-items-center mb-lg-3">
                                <i class="material-icons-two-tone">arrow_back</i>
                                <span class="ps-2">Go Back</span>
                            </div>
                        </a>
                        <div class="card widget widget-payment-request">
                            <div class="card-header">
                                <h5 class="card-title">Submission Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-payment-request-container">
                                    <div class="widget-payment-request-info m-t-md">
                                        <div class="widget-payment-request-info-item">
                                            <span class="widget-payment-request-info-title d-block">
                                                Full Name
                                            </span>
                                            <span class="text-dark d-block">{{ $submission->name }} {{ $submission->surname }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Package
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->package }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Phone Number
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->phone_number }}</span>
                                        </div>
                                        @isset($submission->whatsapp_number)
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Whatsapp Number
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->whatsapp_number }}</span>
                                        </div>
                                        @endisset
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Email
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->email }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Nationality
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->nationality }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Agency
                                                    </span>
                                            <span class="text-dark d-block">
                                                @isset($agency['name'])
                                                {{ $agency['name'] }}
                                                @else
                                                Global Gate
                                                @endisset
                                            </span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Created At
                                                    </span>
                                            <span class="text-dark d-block">{{ $submission->created_at }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Status
                                                    </span>
                                            <span class="text-dark d-block">
                                              @if($submission->status === 'Waiting')
                                                    <span class="badge badge-warning">Waiting</span>
                                                @elseif($submission->status === 'Rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @elseif($submission->status === 'Approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                            <button type="button" class="btn btn-outline-success submission-confirm" data-status="Approved" data-id="{{ $submission->id }}">Approve</button>
                                            <button type="button" class="btn btn-outline-danger submission-confirm" data-status="Rejected" data-id="{{ $submission->id }}">Decline</button>
                                        </div>
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
