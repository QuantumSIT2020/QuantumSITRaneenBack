<!doctype html>
<html lang="en">

<head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Raneen Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate-css/vivify.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/site.min.css') }}">

    <style>
        .auth-main .auth_div {
            width: 600px;
            height: 55%;
        }

        .auth-main {
            background-image: url({{ asset('backend/assets/images/background.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            /* background-size: contain; */
            background-blend-mode: overlay;
            background-color: #f9f9f9fa;
        }
    </style>

</head>

<body class="theme-cyan font-montserrat light_version theme-red">

    

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
        </div>
    </div>
    

    <div class="auth-main particles_js">
        

        @yield('content')
    </div>
    <!-- END WRAPPER -->

    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/mainscripts.bundle.js') }}"></script>

    <script>
        $(window).on('load',function(){
            $('#exampleModalCenter').show();
        });
    </script>
</body>

</html>