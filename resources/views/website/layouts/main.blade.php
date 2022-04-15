<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.head')
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        position: relative;
    }
    .flex{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    body{
        width:100vw;
        min-height: 100vw;
    }
    .trail{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid #2ebd61;
        background: red;
        position: fixed;
        animation: come 1s linear forwards;
    }
    @keyframes come {
        0%{
            transform: scale(0);
        }
        10%{
            transform: scale(1) translateY(0px);
            opacity: 1;
        }
        100%{
            transform: scale(1) translateY(50px);
            opacity: 1;
        }

    }
</style>

<body class="flex">

<script>
    var body=document.body;
    document.addEventListener('mousemove',(e)=>{
       var elem=document.createElement('div');
       elem.setAttribute('class','trail')
        elem.setAttribute('style','left: ${e.clientX -10}px; top: ${e.clientY -10}px;');
       elem.onanimationend=()=>{
           elem.remove();
       }
       body.insertAdjacentElement('beforeend',elem);
    })

</script>

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
<

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
