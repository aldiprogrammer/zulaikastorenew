<html lang="en">

<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive">
    <meta name="author" content="Codedthemes">
    <!-- Favicon icon -->

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/admin/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/admin/pages/waves/css/waves.min.css" type="text/css"
        media="all">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/admin/icon/themify-icons/themify-icons.css">

    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/admin/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}assets/admin/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/admin/css/style.css">
</head>

<body themebg-pattern="theme1">
    <!-- Pre-loader start -->

    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->



                    <form class="md-float-material form-material" method="post" action="{{ route('act_login') }}">
                        @csrf
                        <div class="text-center">
                            {{-- <img src="{{ asset('/') }}assets/admin/images/logo.png" alt="logo.png"> --}}
                            <h4 class="text-white" style="font-weight: bold">ZULAIKA STORE</h4>
                        </div>
                        <div class="auth-box card">

                            <div class="card-block">
                                @if (session('error'))
                                    <div class="alert alert-danger text-center text-white bg-danger" role="alert">
                                        ⚠️ {{ session('error') }}
                                        <br />
                                        Masukan username dan password dengan benar
                                    </div>
                                @endif


                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Login</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        {{-- <div class="forgot-phone text-right f-right">
                                            <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10">
                                        {{-- <p class="text-inverse text-left m-b-0">Thank you.</p> --}}
                                        {{-- <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p> --}}
                                    </div>
                                    <div class="col-md-2">
                                        {{-- <img src="{{ asset('/') }}assets/admin/images/auth/Logo-small-bottom.png" alt="small-logo.png"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/admin/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/admin/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/admin/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/admin/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/admin/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/jquery/jquery.min.js "></script>

    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="{{ asset('/') }}assets/admin/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/jquery-slimscroll/jquery.slimscroll.js">
    </script>
    <script type="text/javascript" src="{{ asset('/') }}assets/admin/js/common-pages.js"></script>



</body>

</html>
