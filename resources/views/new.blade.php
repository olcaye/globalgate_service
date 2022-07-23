<!doctype html>
<html lang="en">
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GlobalGate</title>
    <link rel="stylesheet" href="{{ asset('globalgate_theme/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('globalgate_theme/css/responsive.css') }}">
</head>
<body>
<main class="main" role="main">
    <section class="homepage-section" id="hero">
        <div class="shadow-1">
            <div id="blue-header">
                <div id="logo">
                    <img src="{{ asset('globalgate_theme/images/logo.svg') }}">
                </div>
            </div>
        </div>
        <div class="shadow-2">
            <div id="lightblue-header"></div>
        </div>
        <div id="hero-content" class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 offset-lg-4 col-lg-4" id="slogan">
                    <img class="img-fluid" src="{{ asset('globalgate_theme/images/slogan.png') }}" alt="">
                </div>
                <div class="col-4" id="student">
                    <img src="{{ asset('globalgate_theme/images/student.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="services-section" id="services" style="min-height: 1000px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 card-wrapper">
                    <div class="card" id="golden-package">
                        <div class="package-name">
                            <div class="d-flex flex-column">
                                <span>GOLDEN <small>350 €</small></span>
                                <span>10 months</span>
                                <span>25% Service Discount</span>
                            </div>
                        </div>
                        <div class="package-features">
                            <h4>Free Consultations</h4>
                            <div class="d-flex flex-column">
                                <ul>
                                    <li>Family portal </li>
                                    <li>Internship</li>
                                    <li>Find a job in TRNC</li>
                                    <li>Resident Permit in Turkey</li>
                                    <li>Legal Services and police issues </li>
                                    <li>Company establishment </li>
                                    <li>Project Feasibility study</li>
                                    <li>Project Investment appraisal  </li>
                                    <li>Investment and Financial opportunity</li>
                                    <li>Company Accountant </li>
                                    <br>
                                    <li>Scientific Publications </li>
                                    <li>Academic Research and project Ideas</li>
                                    <li>Survey and Analysis </li>
                                    <br>
                                    <li>Advertisement</li>
                                    <li>Digital Marketing</li>
                                    <li>Sales Employee</li>
                                </ul>
                            </div>
                        </div>
                        <div class="package-specials">
                            <div class="d-flex flex-column">
                                <span>20% University Fee reduction*</span>
                                <span>10% private School Fee reduction*</span>
                                <span><br></span>
                                <span>+</span>
                                <span>Normal Package Services</span>
                                <span><br></span>
                                <span>Silver Package Services</span>
                                <span><br></span>
                                <span> * One Semester only</span>
                            </div>
                        </div>
                        <div class="package-button d-flex align-items-center justify-content-center py-3">
                            <a data-package-name="golden" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal">Select Plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 card-wrapper">
                    <div class="card" id="silver-package">
                        <div class="package-name">
                            <div class="d-flex flex-column">
                                <span>SILVER <small>250 €</small></span>
                                <span>7 months</span>
                                <span>15% Service Discount</span>
                            </div>
                        </div>
                        <div class="package-features">
                            <h4>Free Consultations</h4>
                            <div class="d-flex flex-column">
                                <ul>
                                    <li>Official Invitation to TRNC</li>
                                    <li>Visa Application</li>
                                    <li>International Passport Renewing </li>
                                    <li>University Certificate Attestation</li>
                                    <li>Insurance</li>
                                    <li>Tour package</li>
                                    <li>Hospital Services </li>
                                    <li>Hotel reservation</li>
                                    <li>Rent a home</li>
                                    <li>Car service</li>
                                    <li>Stuff Storage + Moving</li>
                                    <li>Home maintenance</li>
                                    <li>Home cleaning</li>
                                    <li>Gardening</li>
                                </ul>
                            </div>
                        </div>
                        <div class="package-specials">
                            <div class="d-flex flex-column">
                                <span>10% University Fee reduction*</span>
                                <span>5% private School Fee reduction*</span>
                                <span><br></span>
                                <span>+</span>
                                <span>Normal Package Services</span>
                                <span><br></span>
                                <span> * One Semester only</span>
                            </div>
                        </div>
                        <div class="package-button d-flex align-items-center justify-content-center py-3">
                            <a data-package-name="silver" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 card-wrapper">
                    <div class="card" id="normal-package">
                        <div class="package-name">
                            <div class="d-flex flex-column">
                                <span>NORMAL <small>50 €</small></span>
                                <span>5 months</span>
                                <span>10% Service Discount</span>
                            </div>
                        </div>
                        <div class="package-features">
                            <h4>Free Consultations</h4>
                            <div class="d-flex flex-column">
                                <ul>
                                    <li>University Admission</li>
                                    <li>Training + Seminar</li>
                                    <li>Translations + Notary</li>
                                    <br>
                                    <li>Student's Dormitory</li>
                                    <li>Rent a car</li>
                                    <li>Immigration in TRNC</li>
                                    <li>Student Resident permit</li>
                                    <li>Work Resident Permit</li>
                                    <li>Governmental documents</li>
                                    <li>Driver's license procedures </li>
                                    <li>Home registration procedures </li>
                                    <li>Phone Registration</li>
                                    <br>
                                    <li>Opening a bank account in TRNC</li>
                                    <li>Tax office procedures and services</li>
                                </ul>
                            </div>
                        </div>
                        <div class="package-button d-flex align-items-center justify-content-center py-3">
                            <a data-package-name="normal" href="#" class="btn-primary-line" data-toggle="modal" data-target="#packageModal">Select Plan</a>
                        </div>
                    </div>
                    <div class="placeholder-bg">

                    </div>
                </div>

            </div>
        </div>

    </section>
</main>
<footer id="footer" role="contentinfo">
    <div class="container-fluid" id="footer-note">
        <div class="row">
            <div class="col-12">
                <div>Note: The company offers extra services/provides additional services than listed above.</div>
            </div>
        </div>
    </div>
    <div class="container" id="footer-contact">
        <div class="row mx-0 px-0">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="d-flex justify-content-center align-items-center contact-area">
                    <img src="{{ asset('globalgate_theme/images/phone.png') }}" alt="email">
                    <div>
                        Service: <a href="tel:+905488530056">+90 5488530056</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="d-flex justify-content-center align-items-center contact-area">
                    <img src="{{ asset('globalgate_theme/images/mail.png') }}" alt="email">

                    <div>
                        <a href="mailto:info@globalgatecy.com">info@globalgatecy.com</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="d-flex justify-content-center align-items-center contact-area">
                    <img src="{{ asset('globalgate_theme/images/www.png') }}" alt="website">
                    <div>
                        <a href="http://services.globalgatecy.com" target="_blank">services.globalgatecy.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
