@extends('admin.layouts.app')

@section('content')

    <div class="app-content">
        <div class="content-wrapper">
            @include('alerts.toast')
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <a href="{{ route('admin.plans.index') }}" class="text-decoration-none text-success">
                            <div class="d-flex justify-content-start align-items-center mb-lg-3">
                                <i class="material-icons-two-tone">arrow_back</i>
                                <span class="ps-2">Go Back</span>
                            </div>
                        </a>


                        <div class="card widget widget-payment-request">
                            <div class="card-header">
                                <h5 class="card-title">Plan Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-payment-request-container">
                                    <div class="widget-payment-request-info m-t-md">
                                        <div class="widget-payment-request-info-item">
                                            <span class="widget-payment-request-info-title d-block">
                                                Plan Name
                                            </span>
                                            <span class="text-dark d-block">{{ $plan->name }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Price
                                                    </span>
                                            <span class="text-dark d-block">{{ $plan->price_with_symbol }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Credits
                                                    </span>
                                            <span class="text-dark d-block">{{ $plan->credits }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Duration
                                                    </span>
                                            <span class="text-dark d-block">{{ $plan->duration_with_month }}</span>
                                        </div>
                                        <div class="widget-payment-request-info-item">
                                                    <span class="widget-payment-request-info-title d-block">
                                                        Is active?
                                                    </span>
                                            @if($plan->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-warning">Not Active</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card widget widget-payment-request">
                            <div class="card-header">
                                <h5 class="card-title">Modify Plan</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.plans.update', ['id' => $plan->id ]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ $plan->name }}">
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $plan->price }}">
                                            @if ($errors->has('price'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('price') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label @error('credits') is-invalid @enderror">Credits</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="credits" class="form-control" value="{{ $plan->credits }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputState" class="col-sm-4 col-form-label @error('duration') is-invalid @enderror">Duration</label>
                                        <div class="col-sm-8">
                                        <select id="inputState" name="duration" class="form-select">
                                            @for($i = 1; $i <= 12; $i++)
                                                <option @if($i == $plan->duration) selected @endif value="{{ $i }}">{{ $i }} Months</option>
                                            @endfor
                                        </select>
                                            @if ($errors->has('duration'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('duration') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputState" class="col-sm-4 col-form-label">Status of The Plan</label>
                                        <div class="col-sm-8">
                                            <select id="inputState" name="is_active" class="form-select">
                                                @if($i == $plan->is_active)
                                                    <option selected value="1">Active</option>
                                                    <option value="0">Disabled</option>
                                                @else
                                                    <option value="1">Active</option>
                                                    <option selected value="0">Disabled</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('footer-scripts')
    @include('admin.scripts.agency_show')
@endsection
