@extends('website.layouts.main')
@section('content')


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

        <section class="page-title" style="height: 700px;">
            <div class="page-title-container">
                <div class="page-title-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col col-xs-12">
                                <h1 style="color: whitesmoke;font-size: 100px; margin-top: 0px;">403</h1>
                                <h3 style="color: red; font-size: 65px; ">Oops! Not allowed</h3>
                                <ol class="breadcrumb">
                                    <p style="color: whitesmoke; font-size: 50px">If you want to do this, you must first login or join..</p>
                                    <a href="{{route('home')}}" class="theme-btn" style="margin-top: 50px">Back to home</a>


                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->



    </div>

@endsection
