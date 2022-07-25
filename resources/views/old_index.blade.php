<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Global Gate Services</title>
    <meta name="description" content="Global Gate Services" />
    <meta name="keywords" content="" />
    <meta name="author" content="Olcay Ergul"/>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon.png') }}" />

    <!-- Bootstrap & Plugins CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <link href="{{ asset('css/countrySelect.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/blue.css') }}" rel="stylesheet" type="text/css">
    <style>
        .country-select .flag {background-image: url( {{ asset('images/theme/flags/flags.png') }});}
    </style>
</head>
<body>

@include('alerts.toast')

<!-- ***** Pricing Plans Start ***** -->
<div class="container header-wrapper">
    <div class="header-logo">
        <img src="{{ asset('images/theme/logo22.png') }}" class="logo" alt="" width="150" height="150">
    </div>
</div>

<section class="section colored" id="pricing-plans">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Package Pricing Plans</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Paragraph about packages</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="pricing-item" id="normal-item">
                    <div class="ribbon-wrap">
                        <span class="ribbon">Free Consultant</span>
                    </div>

                    <div class="pricing-header normal-plan">
                        <h3 class="pricing-title">NORMAL</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">€</span>
                            <span class="price">50</span>
                            <span class="period">/ 5 Months</span>
                            <br>10% Service Discount
                        </div>
                        <ul class="list plan-feature-list">
                            <li class="active">School Registration</li>
                            <li class="active">University Admission</li>
                            <li class="active">Training + Seminar</li>
                            <li class="active">Translations + Notary</li>
                            <li class="active">Student's Dormitory</li>
                            <li class="active">Rent a car</li>
                            <li class="active">Immigration in TRNC</li>
                            <li class="active">Student Resident Permit</li>
                            <li class="active">Work Resident Permit</li>
                            <li class="active">Governmental Documents</li>
                            <li class="active">Driver's license procedures</li>
                            <li class="active">Home registration procedures</li>
                            <li class="active">Phone Registration</li>
                            <li class="active">Opening a bank account in TRNC</li>
                            <li class="active">Tax office procedures and services</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a data-package-name="normal" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal" >Select Plan</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->

            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                <div class="pricing-item active" id="silver-item">
                    <div class="ribbon-wrap">
                        <span class="ribbon">Free Consultant</span>
                    </div>
                    <div class="pricing-header silver">
                        <h3 class="pricing-title">SILVER</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">€</span>
                            <span class="price">250</span>
                            <span class="period">/ 7 Months</span>
                            <br><span>15% Service Discount</span>
                        </div>
                        <div class="highlighted-features d-flex flex-column">
                            <span>10% University Fee reduction *</span>
                            <span>5% private School Fee reduction *</span>
                            <span>+ Normal Package Services</span>
                            <div class="notes">
                                <small>* This features are available for only one semester</small>
                                <small>** In bank transfer, the price will include additional taxes.</small>
                            </div>
                        </div>

                        <ul class="list">
                            <li class="active">Official Invitation to TRNC</li>
                            <li class="active">Visa Application</li>
                            <li class="active">International Passport Renewing</li>
                            <li class="active">Insurance</li>
                            <li class="active">Tour package</li>
                            <li class="active">Hospital Services</li>
                            <li class="active">Hotel reservation</li>
                            <li class="active">Rent a home</li>
                            <li class="active">Car services</li>
                            <li class="active">Staff Storages + Moving</li>
                            <li class="active">Home maintenance</li>
                            <li class="active">Home cleaning</li>
                            <li class="active">Gardening</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a data-package-name="silver" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal" >Select Plan</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->

            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                <div class="pricing-item" id="gold-item">
                    <div class="ribbon-wrap">
                        <span class="ribbon">Free Consultant</span>
                    </div>
                    <div class="pricing-header gold">
                        <h3 class="pricing-title">GOLDEN</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">€</span>
                            <span class="price">350</span>
                            <span class="period">/ 10 Months</span>
                            <br><span>25% Service Discount</span>
                        </div>
                        <div class="highlighted-features d-flex flex-column">
                            <span style="padding-top:20px">20% University Fee reduction *</span>
                            <span>10% private School Fee reduction *</span>
                            <span>+ Normal & Silver Packages Services</span>
                            <div class="notes">
                                <small>* This features are available for only one semester</small>
                                <small>** In bank transfer, the price will include additional taxes.</small>
                            </div>
                        </div>
                        <ul class="list">
                            <li class="active">Family Portal</li>
                            <li class="active">Internship</li>
                            <li class="active">Find a job in TRNC</li>
                            <li class="active">Resident Permit in Turkey</li>
                            <li class="active">Legal Services and police issues</li>
                            <li class="active">Company establishment</li>
                            <li class="active">Project Feasibility study</li>
                            <li class="active">Project Investment appraisal</li>
                            <li class="active">Investment and Financial apportunity</li>
                            <li class="active">Company Accountant</li>
                            <li class="active">Scientific Publications</li>
                            <li class="active">Academic Research and project Ideas</li>
                            <li class="active">Survey and Analysis</li>
                            <li class="active">Advertisement</li>
                            <li class="active">Digital Marketing</li>
                            <li class="active">Sales Personal</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a data-package-name="golden" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal" >Select Plan</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->
        </div>
    </div>
</section>
<!-- ***** Pricing Plans End ***** -->


<!-- Modal -->
<div class="modal fade" id="packageModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submission Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('service-submission') }}">
            <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="name">First name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="First name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="surname">Last name</label>
                            <input type="text" name="surname" class="form-control" id="surname" placeholder="Last name" required value="{{ old('surname') }}">
                            @if ($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
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
                    <div class="form-row">
                        <div class="col-md-12 mb-3 d-flex flex-column">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" name="phone_number" class="form-control" id="phone_number" required value="{{ old('phone_number') }}">
                            @if ($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3 d-flex flex-column">
                            <label for="whatsapp_number">Whatsapp Number</label>
                            <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number" value="{{ old('whatsapp_number') }}">
                        </div>
                    </div>
                    <input type="hidden" name="package" id="package_name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" >Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thank You</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                The application was successful and our manager will contact with you soon
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <img src="{{ asset('images/theme/logo22.png') }}" class="logo" alt="" width="100" height="100">
               {{-- <div class="text">Test Texts</div>--}}
                    <ul class="social">
                        <li><a href="https://www.facebook.com/globalgate.services/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/p/CfjB1VwKYxc/?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <h5>Helpful Links</h5>
                <ul class="footer-nav">
                    <li><a href="#"><i class="fa fa-angle-right"></i><span>About Us</span></a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i><span>FAQ</span></a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <h5>Support</h5>
                <ul class="footer-nav">
                    <li><a href="#"><i class="fa fa-angle-right"></i><span>Privacy Policy</span></a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i><span>Terms of Use</span></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <h5>Contact Us</h5>
                <div class="address">
                    <p>Eastern Mediterranean University, South Campus, Famagusta, TRNC</p>
                    <p>Phone: +905488530056</p>
                    <p><span>E-Mail:</span><a href="#">info@globalgatecy.com</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="copyright">© 2022 Global Gate. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- ***** Footer End ***** -->



<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.0/js/countrySelect.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>

    @if(Session::has('success'))
         $('#successModal').modal('show')
    @endif

    if ($('.toast').hasClass('active')) {
        $(".toast").toast('show');
    }

    $('#packageModal').on('show.bs.modal', function (event) {
        var myVal = $(event.relatedTarget).data('package-name');
        $('#package_name').val(myVal);
    });

</script>

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
            url: "http://ipinfo.io/json?token=54f93cacb88eae",
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
</body>
</html>
