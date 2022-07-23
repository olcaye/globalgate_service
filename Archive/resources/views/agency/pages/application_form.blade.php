@extends('agency.layouts.app')

@section('content')

    <div class="app-content">
        <div class="content-wrapper">
            @include('agency.errors.toast')
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="page-description">
                            <h1>New Application</h1>
                            <span>You're creating a new application.</span>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Create New Application</h5>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('agency.application.store') }}" method="POST" class="row g-3 m-t-md" id="profileSettingsForm">
                                    @csrf
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3">
                                            <label for="name">First name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="First name" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3">
                                            <label for="surname">Last name</label>
                                            <input type="text" name="surname" class="form-control" id="surname" placeholder="Last name" required value="{{ old('surname') }}">
                                            @if ($errors->has('surname'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('surname') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3 d-flex flex-column">
                                            <label for="nationality">Nationality</label>
                                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Nationality" required>
                                            @if ($errors->has('nationality'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('phone_number') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3 d-flex flex-column">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="tel" name="phone_number" class="form-control" id="phone_number" required value="{{ old('phone_number') }}">
                                            @if ($errors->has('phone_number'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('phone_number') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3 d-flex flex-column">
                                            <label for="whatsapp_number">Whatsapp Number</label>
                                            <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number" value="{{ old('whatsapp_number') }}">
                                        </div>
                                    </div>
                                    <div class="form-row required">
                                        <div class="col-md-12 mb-3 d-flex flex-column">
                                            <label for="package">Package</label>
                                                <select class="form-select" name="package" id="package">
                                                    <option value="normal">Normal</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="golden">Golden</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row m-t-lg">
                                        <div class="col">
                                            <button type="submit" class="btn btn-success m-t-sm float-end">Save Applicant</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.0/js/countrySelect.min.js"></script>
    <script>
        function getIp(callback) {
            fetch('https://ipinfo.io/json?token=54f93cacb88eae', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .catch(() => {
                    return {
                        country: 'tr',
                    };
                })
                .then((resp) => callback(resp.country));
        }

        $( document ).ready(function() {
            var country = 'tr'
            $.ajax({
                url: "https://ipinfo.io/json?token=54f93cacb88eae",
                success: function(response) {
                    country = (response.country);
                    $("#nationality").countrySelect({
                            defaultCountry: country.toLowerCase()
                        }
                    );
                },
                dataType: 'json',
                statusCode: {
                    429: function() {
                        alert( "Number of tries exceeded" );
                    }
                }
            });
        });


        const phoneInputField = document.querySelector("#phone_number");
        const whatsAppNumber = document.querySelector("#whatsapp_number");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            nationalMode: true,
            geoIpLookup: getIp,
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        const whatsAppInput = window.intlTelInput(whatsAppNumber, {
            initialCountry: "auto",
            nationalMode: true,
            geoIpLookup: getIp,
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        $("#phone_number").bind('keyup',function(){
            $(this).val(phoneInput.getNumber());
        });

        $("#whatsapp_number").bind('keyup',function(){
            $(this).val(whatsAppInput.getNumber());
        });


    </script>
@endsection
