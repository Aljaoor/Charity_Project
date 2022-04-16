<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.head')
</head>


<body>


<!-- start page-wrapper -->
<div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- end preloader -->

    <!-- Start header -->
    <header id="header" class="tp-site-header header-style-2">
        @include('website.layouts.header')
    </header>
    <!-- end of header -->


    @yield('content')


    <!-- start tp-site-footer -->
    <footer class="tp-site-footer">
        @include('website.layouts.footer')
    </footer>
    <!-- end tp-site-footer -->
</div>
<!-- end of page-wrapper -->
@include('website.layouts.javascript')
</body>

</html>
