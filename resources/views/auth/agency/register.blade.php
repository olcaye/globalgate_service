<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .was-validated select.select2:invalid + .select2.select2-container.select2-container--default span.select2-selection, select.select2.is-invalid + .select2.select2-container.select2-container--default span.select2-selection {
            border-color: #fa5c7c;
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fa5c7c' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23fa5c7c' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        .was-validated select.select2:invalid + .select2.select2-container.select2-container--default .select2-selection__arrow, select.select2.is-invalid + .select2.select2-container.select2-container--default .select2-selection__arrow {
            right: 25px!important;
        }
        .was-validated select.select2:valid + .select2.select2-container.select2-container--default span.select2-selection, select.select2.is-valid + .select2.select2-container.select2-container--default span.select2-selection {
            border-color: #0acf97;
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%230acf97' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        .was-validated select.select2:valid + .select2.select2-container.select2-container--default .select2-selection__arrow, select.select2.is-valid + .select2.select2-container.select2-container--default .select2-selection__arrow {
            right: 25px!important;
        }
    </style>
</head>

<body>
<form action="{{ route('agency.register.post') }}" class="form-signin" method="post">
    @csrf
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>

    <div class="mb-3">
        <label for="name" class="sr-only">Name</label>
        <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Agency Name" required autofocus value="{{ old('name') }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>



    <div class="mb-3">
        <label for="phone" class="sr-only">Phone</label>
        <input name="phone" type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" required autofocus value="{{ old('phone') }}">
        @if ($errors->has('phone'))
            <div class="invalid-feedback">
                {{ $errors->first('phone') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="address" class="sr-only">Address</label>
        <input name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required autofocus value="{{ old('address') }}">
        @if ($errors->has('address'))
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="email" class="sr-only">Email address</label>
        <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <div class="form-group">
            <select class="countries form-control @error('country') is-invalid @enderror"
                    id="country-dd" name="country" data-placeholder="Select A Country">
                <option value=""></option>
                @foreach ($countries as $data)
                    @if (old('country') == $data->id)
                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                    @else
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('country'))
                <div class="invalid-feedback">
                    {{ $errors->first('country') }}
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3" id="state-dd-wrapper">
        <div class="form-group">
            <select id="state-dd" class="form-control @error('state') is-invalid @enderror" name="state" >
            </select>
            @if ($errors->has('state'))
                <div class="invalid-feedback">
                    {{ $errors->first('state') }}
                </div>
            @endif
        </div>
    </div>
    <div class="mb-3" id="city-dd-wrapper">
        <div class="form-group">
            <select id="city-dd" class="form-control @error('city') is-invalid @enderror" name="city">
            </select>
            @if ($errors->has('city'))
                <div class="invalid-feedback">
                    {{ $errors->first('city') }}
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="sr-only">Password</label>
        <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
        @if ($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="sr-only">Confirm Password</label>
        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
        @endif
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#country-dd, #state-dd, #city-dd').select2({
            width: 'resolve' // need to override the changed default
        });
    });




    $(document).ready(function () {

        if(!$('#country-dd').val()) {
            $('#state-dd-wrapper, #city-dd-wrapper').hide();
        }

        if(!$('#state-dd').val()) {
            $('#city-dd-wrapper').hide();
        }



        let state = '{{ old('state') }}';
        if($('#country-dd').val()) {
            if(state) {
                getState(state);
                $('#city-dd-wrapper').show();
                fetchCities(state);
            } else {
                fetchStates($('#country-dd').val())
            }
            $('#state-dd-wrapper').show();
        }

        console.log(state);

        function getState(stateID) {
            $("#state-dd").html('');
            $.ajax({
                url: "{{ url('api/state') }}",
                type: "POST",
                data: {
                    state_id: stateID,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result)
                    $('#state-dd-wrapper').fadeIn();
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        }

        function fetchStates(countryID) {
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: countryID,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd-wrapper').fadeIn();
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                    return false;
                }
            });
        }

        function fetchCities(stateID) {
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: stateID,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd-wrapper').fadeIn();
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }

        $('#country-dd').on('change', function () {
            $("#country-dd,#state-dd,#city-dd").removeClass('is-invalid');
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd-wrapper').fadeIn();
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            $("#state-dd, #city-dd").removeClass('is-invalid');
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd-wrapper').fadeIn();
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        $('#city-dd').on('change', function () {
            $("#city-dd").removeClass('is-invalid');
        });
    });
</script>
</body>
</html>
