<head>
    <title>@yield('title') | @lang('tr.Dashboard')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Raneen Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords" content="admin template, Raneen admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="Raneen">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate-css/vivify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/c3/c3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/chartist/css/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/toastr/toastr.min.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/mydash.css') }}">


    <style>
        .c_grid .circle img {
            max-width: 100%;
            height: 100%;
        }
        .wizard > .content{
        min-height: 35em;
        background: #282b2f;
    }

    .c_yellow{
        box-shadow: 1px 1px 1px 1px #0000003d; 
    }

    .card .body{
        border: 1px dashed #ffffff42;
    }

    .btn{
        background: #b22827;
        color: white;
        border-color: #b22827;
    }

    .btn:hover{
        background:#711211;
        border-color:#711211;
        color:white;
    }

    .header>h2{
        color:white;
    }

    .role-card{
        background: transparent;
        border: 1px dotted #ffffff42;
        padding: 5px;
        color: #969595;
    }
    </style>


    @yield('stylesheet')

</head>


