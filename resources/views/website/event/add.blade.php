@extends('website.layouts.main')

@section('content')

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
        @if(session()->has('Add'))
            <div class="clearfix error-handling-messages">
                <div id="success">Thank you</div>
                {{--                <div id="error"> Error occurred while sending email. Please try again later. </div>--}}
            </div>
        @endif
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
                            <div class="volunteer-contact">
                                <div class="volunteer-contact-form">
                                    <form  action="{{route('event.create')}}" method="post" class="contact-validation-active" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="text" class="form-control" name="where" id="where" placeholder="ُEnter the place...">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group form-group-in">
                                                <label for="file">Upload Event Image</label>
                                                <div  style="font-size: 10px;">  jpeg ,.jpg , png : صيغة المرفق</div>
                                                <input id="file" type="file" class="form-control" name="event_image" accept=".jpg, .png, image/jpeg, image/png">
                                                <i class="ti-cloud-up"></i>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="date" class="form-control" name="from_date" id="from_date">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                                <input type="date" class="form-control" name="to_date" id="to_date">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                                <input type="text" class="form-control" name="count_of_volunteers" id="count_of_volunteers" placeholder="Number of volunteers">
                                            </div>


                                            <div class="col-lg-12 col-12 form-group">
                                                <textarea class="form-control" name="describe" id="describe" placeholder="Case Description..."></textarea>
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
            <div class="volunteer-area v2 section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="section-title section-title2 text-center">
                                <div class="thumb-text">
                                    <span>Events</span>
                                </div>
                                <h2>Our Great Events</h2>
                                <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point.</p>
                            </div>
                        </div>
                    </div>
                    <div class="volunteer-wrap">
                        <div class="row">
                            <div class="col col-md-3 col-sm-6 custom-grid col-12">
                                <div class="volunteer-item">
                                    <div class="volunteer-img">
                                        <img src="{{asset('website/images/event/1.jpg')}}" alt="">
                                    </div>
                                    <div class="volunteer-content">
                                        <h2><a href="#">مساعدات دراسية </a></h2>
                                        <span>ُEvent</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-3 col-sm-6 custom-grid col-12">
                                <div class="volunteer-item">
                                    <div class="volunteer-img">
                                        <img src="{{asset('website/images/event/2.jpg')}}" alt="">
                                    </div>
                                    <div class="volunteer-content">
                                        <h2><a href="#">إفطار صائم</a></h2>
                                        <span>ُEvent</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-3 col-sm-6 custom-grid col-12">
                                <div class="volunteer-item">
                                    <div class="volunteer-img">
                                        <img src="{{asset('website/images/event/3.jpg')}}" alt="">
                                    </div>
                                    <div class="volunteer-content">
                                        <h2><a href="#">إفطار صائم</a></h2>
                                        <span>ُEvent</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-3 col-sm-6 custom-grid col-12">
                                <div class="volunteer-item">
                                    <div class="volunteer-img">
                                        <img src="{{asset('website/images/blog/img-4.jpg')}}" alt="">
                                    </div>
                                    <div class="volunteer-content">
                                        <h2><a href="#">مساعدات دراسية</a></h2>
                                        <span>ُEvent</span>
                                    </div>
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
    <!-- end of page-wrapper -->

@endsection
