<!doctype html>
<html lang="en">

@include('backend.components.head')
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

    @include('backend.components.theme')
    
    <div class="overlay"></div>
    
    @include('backend.components.topnav')

    @include('backend.components.search')

    @include('backend.components.megamenu')

    @include('backend.components.rightbar')

    @include('backend.components.leftbar')

    @include('backend.components.content')
    
    @include('backend.components.scripts')

</body>
</html>
