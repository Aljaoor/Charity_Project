@extends('website.layouts.main')

@section('content')
    <style>

        #background {
            width: 100%;
            height: 100%;
            display: block;
            position: fixed;
            left: 0;
            top: 0;
            z-index: -1;
            pointer-events: none;
            border: none;
        }

    </style>
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
        <!-- start page-title -->
        <section class="page-title">
            <div class="page-title-container">
                <div class="page-title-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col col-xs-12">
                                <h2>Create a New Event</h2>
                                <ol class="breadcrumb">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li>New Event</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <iframe id="background" src="https://threejs.org/manual/examples/responsive.html"></iframe>
        <div id="content">
        <!-- volunteer-area-start -->
        <div class="volunteer-area ">
            <div class="volunteer-wrap section-padding">
                <div class="container">
                    <div class="row">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="volunteer-item">
                                <div class="volunteer-img-wrap">
                                    <div class="volunter-img">
                                        <img src="{{asset('website/images/about/img-1.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="volunteer-contact" >
                                <div class="volunteer-contact-form" style="background: black;">
                                    <form  action="{{route('event.create')}}" method="post" class="contact-validation-active" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="ُEnter name or title...">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group form-group-in">
                                                <label for="file">Upload Event Image</label>
                                                <div  style="font-size: 10px; color: red">Attachment Format:jpeg ,.jpg , png</div>
                                                <input id="file" type="file" class="form-control" name="event_image" accept=".jpg, .png, image/jpeg, image/png">
                                                <i class="ti-cloud-up"></i>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <div  style="font-size: 20px; margin-left: 5px;"> Start At:</div>

                                                <input type="date" class="form-control" name="from_date" id="from_date" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                                <div  style="font-size: 20px; margin-left: 5px;"> End In:</div>

                                                <input type="date" class="form-control" name="to_date" id="to_date">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                                <input type="text" class="form-control" name="count_of_volunteers" id="count_of_volunteers" placeholder="Number of volunteers">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="text" class="form-control" name="where" id="where" placeholder="ُEnter the place...">
                                            </div>


                                            <div class="col-lg-12 col-12 form-group">
                                                <textarea class="form-control" name="describe" id="describe" placeholder="Case Description..."></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="text" class="form-control" name="location" id="location" placeholder="ُEnter the link of location...">
                                            </div>
                                            <div class="submit-area sub-btn" style="margin-left: 40%;">
                                                <a href="https://www.google.com/maps/place/%D9%85%D9%84%D8%B9%D8%A8+%D8%A7%D9%84%D8%A8%D8%A7%D8%B3%D9%84%E2%80%AD/@34.761254,36.6956716,12z/data=!4m5!3m4!1s0x1523096871f07adb:0x60a856d8afb9c1fb!8m2!3d34.7164856!4d36.6888765" target="_blank" class="theme-btn submit-btn">google map</a>
                                            </div>
                                            <div class="submit-area col-lg-12 col-12">
                                                <button type="submit" class="theme-btn submit-btn">Add Event</button>
                                                <div id="loader">
                                                    <i class="ti-reload"></i>
                                                </div>
                                            </div>

                                        </div>
                                            <div class="clearfix error-handling-messages">
                                                <div id="success">Thank you</div>
                                                <div id="error"> Error occurred while sending email. Please try again later. </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- volunteer-area start -->
        </div>
        <!-- volunteer-area-end -->
        </div>
    </div>
    <!-- end of page-wrapper -->

@endsection
