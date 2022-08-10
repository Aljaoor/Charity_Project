@include('sweetalert::alert')
@extends('website.layouts.main')
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false )
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
@endif
@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    @endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
{{--{{auth()->user()->name}}--}}





@if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p style="color: red; text-align: center;">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('alert'))
        <script>

            swal({
                title: 'Thank you',
                text: "{!! Session::get('alert') !!}",
                icon: "success",
                button: "ok!",
            });
        </script>
    @endif
@if ($message = Session::get('status'))
    <script>

        Swal.fire({
            title: "{!! Session::get('status') !!}",
            width: 600,
            padding: '3em',
            color: '#716add',
            background: '#fff url(/images/trees.png)',
            backdrop: `
    rgba(123,0,0,0.6)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
        })
    </script>
@endif


@if ($message = Session::get('volunteering'))
    <script>

        swal({
            title: 'oops',
            text: "{!! Session::get('volunteering') !!}",
            icon: "error",
            button: "close!",
        });
    </script>
@endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p style="text-align: center;">{{ $message }}</p>
        </div>
    @endif
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
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12  grid col-12">
                    <div class="about-cercle">
                        <div class="about-img">
                            <img src="{{asset('website/images/about/img-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 grid  col-sm-12 col-12">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Bright Of Hope is <span>Nonprofit</span> Organization <span>For Help</span> Children.</h2>
                        </div>
                        <p>A development charity concerned with the care of orphaned children and needy and poor families within the city of Homs</p>
                        <div class="ab-icon-area">
                            <div class="about-icon-wrap">
                                <div class="about-icon-item">
                                    <div class="ab-icon">
                                        <img draggable="false" src="{{asset('website/images/about/1.png')}}" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="causes-single.html">Save <br> Orphan</a></h2>
                                    </div>
                                </div>
                                <div class="about-icon-item">
                                    <div class="ab-icon ab-icon2">
                                        <img draggable="false" src="{{asset('website/images/about/1.png')}}" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="causes-single.html">save <br> Children</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ab-shape">
            <img src="{{asset('website/images/shape/shape2.png')}}" alt="">
        </div>
    </div>
    <!-- about-area end -->
    <!-- features-area start -->
    <div class="features-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="features-text">
                        <div class="section-title">
                            <div class="thumb-text">
                                <span>FEATURES</span>
                            </div>
                        </div>
                        <h2>The great journey to end poverty for good begins with a child.</h2>
                        <p>Contribute now, donate to save thousands of lives and help them live a decent life and build their future.</p>
                        <a href="{{url('donate')}}" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="features-wrap">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <img draggable="false" src="{{asset('website/images/features/img-1.png')}}" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2><a href="causes-single.html">bail of orphan</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item-2">
                                    <div class="features-icon">
                                        <img draggable="false" src="{{asset('website/images/features/img-2.png')}}" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2><a href="causes-single.html">Hope Operator</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item-2 active">
                                    <div class="features-icon">
                                        <img draggable="false" src="{{asset('website/images/features/img-3.png')}}" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2><a href="causes-single.html">Environtment Recyle</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <img draggable="false" src="{{asset('website/images/features/img-4.png')}}" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2><a href="causes-single.html">Fasting food & Sacrifice</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features-area end -->
    <!-- case-area-start -->
    <div class="case-area section-padding">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title section-title2 text-center">
                    <div class="thumb-text">
                        <span>Bailouts</span>
                    </div>
                    <h2>Latest Bailouts of our Charity </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-1.png')}}" alt="">
                                <div class="case-btn">
                                    <a href="{{url('donate')}}" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="{{url('donate')}}">GOAL : 5 millions S.P</a></li>
                                <li><a href="{{url('donate')}}">RISED : 2 millions S.P</a></li>
                            </ul>
                            <h3><a href="{{url('donate')}}">Financial Help for Poor Families</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-2.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="{{url('donate')}}" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="{{url('donate')}}">GOAL : 8 millions S.P</a></li>
                                <li><a href="{{url('donate')}}">RISED : 3 millions S.P</a></li>
                            </ul>
                            <h3><a href="{{url('donate')}}">Education for Poor Children</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-6.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="{{url('donate')}}" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="{{url('donate')}}">GOAL : 4 millions S.P</a></li>
                                <li><a href="{{url('donate')}}">RISED : 1 millions S.P</a></li>
                            </ul>
                            <h3><a href="{{url('donate')}}">Supporting scientific projects</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case-area-end -->
    <!-- cta-area start -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="cta-left">
                        <h2>If You Want To Join Us As a Volunteer. <a href="{{url('join')}}"><br>
                                Click Here</a> </h2>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1 col-md-12 col-12">
                    <div class="cta-wrap">
                        <div class="cta-call">
                            <span>Call Us!</span>
                            <h3>+963 964 444 111</h3>
                        </div>
                        <div class="cta-call" style="margin-left: 100px; ">
                            <span>E-mail Us!</span>
                            <h3>    <a href = "mailto: project.4tth@gmail.com"> project.4tth@gmail.com</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta-area start -->
    <!-- event-area start -->
    <div class="event-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>EVENTS</span>
                        </div>
                        <h2>Our Upcoming Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('event.index')}}">
                    <div class="event-item">
                        <div class="event-img">
                            <img src="{{asset('website/images/event/1.jpg')}}" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>MAR</span>
                                    <h4>28</h4>
                                </div>
                            </div>


                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 9:00 AM - 10:00 AM</li>
                                    <li><i class="ti-location-pin"></i> 968, Homs, Syria.</li>
                                </ul>
                                <h2>التمرات</h2>
                                <p>توزيع التمر على الصائمين في حمص قبل أذان المغرب</p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="{{route('event.index')}}">
                    <div class="event-item">
                        <div class="event-img">
                            <img src="{{asset('website/images/event/2.jpg')}}" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>JUN</span>
                                    <h4>12</h4>
                                </div>
                            </div>
                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 16:00 PM - 21:00 PM</li>
                                    <li><i class="ti-location-pin"></i> 968, Homs, Syria.</li>
                                </ul>
                                <h2><a href="{{route('event.index')}}">رداء الخير</a></h2>
                                <p>يستقبل الملابس الجديدة والمستعملة والأثاث الجديد والمستعمل ويعيد تأهليها ويتم توزيعها على المحتاجين والأرامل</p>
                            </div>
                        </div>
                    </div>
                    </a>
                        <a href="{{route('event.index')}}">
                    <div class="event-item">
                        <div class="event-img">
                            <img src="{{asset('website/images/event/3.jpg')}}" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>MAR</span>
                                    <h4>7</h4>
                                </div>
                            </div>
                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 11:00 AM - 14:00 PM</li>
                                    <li><i class="ti-location-pin"></i> 968, Homs, Syria.</li>
                                </ul>
                                <h2><a href="{{route('event.index')}}"></a>لتبقى مدينتنا أجمل</h2>
                                <p>مبادرة تأهيل وتنظيف حديقة الكورنيش</p>
                            </div>
                        </div>
                    </div>

                        </a>
                </div>
            </div>
        </div>
        <div class="shape1"><img src="{{asset('website/images/event//1.png')}}" alt=""></div>
        <div class="shape2"><img src="{{asset('website/images/event//2.png')}}" alt=""></div>
    </div>
    <!-- event-area start -->
    <!-- volunteer-area start -->
    <div class="volunteer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>Volunteer</span>
                        </div>
                        <h2>Our Great Team</h2>
                        <p>Site Programming Team from IT Albaath University</p>
                    </div>
                </div>
            </div>
            <div class="volunteer-wrap">
                <div class="row">
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="{{asset('website/images/team/1.png')}}" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Hanan Fattoum</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="{{asset('website/images/team/2.png')}}" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Layal Deeb</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="{{asset('website/images/team/3.png')}}" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Omar Alsalkhadi</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="{{asset('website/images/team/4.png')}}" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Mohammad Aljaoor</a></h2>
                                <span>Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- volunteer-area start -->
    <!-- start testimonials-section-s2 -->
    <!-- end testimonials-section-s2 -->
    <!-- blog-area start -->
    <div class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>News</span>
                        </div>
                        <h2>Our Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="row">
                    <div class="col col-md-6 col-12" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('website/images/football2.jpg')}}" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2>تعلن جمعيتنا عن بدء التسجيل في فريق الأمل لكرة القدم</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2>افتتاح مشغل لجمعية شعاع الأمل الخيرية </h2>
                            </div>
                            <div class="blog-img">
                                <img src="{{asset('website/images/party.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <div class="blog-item">
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2>طفلة من متطوعات الأمل قررت جمع مصروفها في شهر رمضان كاملا وتقديمه كهدية عيد</h2>
                            </div>
                            <div class="blog-img">
                                <img src="{{asset('website/images/girl.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('website/images/folowers.jpg')}}" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2>اقامة الحفل الخيري السنوي الرابع تحت شعار (الخير انتم أهله ونحن طريقه) </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <!-- start partners-section -->
{{--    <section class="partners-section section-padding">--}}
{{--        <h2 class="hidden">Partners</h2>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col col-xs-12">--}}
{{--                    <div class="partner-grids partners-slider">--}}
{{--                        <div class="grid">--}}
{{--                            <img src="{{asset('website/images/partners/1.png')}}" alt>--}}
{{--                        </div>--}}
{{--                        <div class="grid">--}}
{{--                            <img src="{{asset('website/images/partners/2.png')}}" alt>--}}
{{--                        </div>--}}
{{--                        <div class="grid">--}}
{{--                            <img src="{{asset('website/images/partners/3.png')}}" alt>--}}
{{--                        </div>--}}
{{--                        <div class="grid">--}}
{{--                            <img src="{{asset('website/images/partners/4.png')}}" alt>--}}
{{--                        </div>--}}
{{--                        <div class="grid">--}}
{{--                            <img src="{{asset('website/images/partners/5.png')}}" alt>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- end container -->--}}
{{--    </section>--}}
    <!-- end partners-section -->

</div>

@endsection


