
@extends('website.layouts.main')
@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p style="color: red; margin-left: 600px;">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p style="margin-left: 600px;">{{ $message }}</p>
        </div>
    @endif
{{Auth::user()->name}}
    <a href="{{url('/log')}}"> aaaaaaa</a>
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
                            <div class="thumb-text">
                                <span>ABOUT US</span>
                            </div>
                            <h2>Khairah is <span>Nonprofit</span> Organization <span>For Help</span> Children.</h2>
                        </div>
                        <p>It is a long established fact that a reader will be distracted by thethe readable content off a page when looking at its layout point using Lorem Ipsum is that it has.</p>
                        <div class="ab-icon-area">
                            <div class="about-icon-wrap">
                                <div class="about-icon-item">
                                    <div class="ab-icon">
                                        <img draggable="false" src="{{asset('website/images/about/1.jpg')}}" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="causes-single.html">Save <br> Children.</a></h2>
                                    </div>
                                </div>
                                <div class="about-icon-item">
                                    <div class="ab-icon ab-icon2">
                                        <img draggable="false" src="{{asset('website/images/about/2.png')}}" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="causes-single.html">Fresh And <br> Clean Water.</a></h2>
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
                        <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point that it has.</p>
                        <a href="#" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
                                        <h2><a href="causes-single.html">Cancer Treatment</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item-2">
                                    <div class="features-icon">
                                        <img draggable="false" src="{{asset('website/images/features/img-2.png')}}" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2><a href="causes-single.html">Hospital Build</a></h2>
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
                                        <h2><a href="causes-single.html">Food & Build Home</a></h2>
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
                        <span>CAUSES</span>
                    </div>
                    <h2>Latest Caused of Khairah.</h2>
                    <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-1.png')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Financial Help for Poor Families</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-2.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Education for Poor Children</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-3.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Send Child to School for a Year</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-4.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Food And Home for Children</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-5.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Pure Water For The World</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="{{asset('website/images/cause/img-6.jpg')}}" alt="">
                                <div class="case-btn">
                                    <a href="donate.html" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="#">GOAL : $9860</a></li>
                                <li><a href="#">RISED : $768</a></li>
                            </ul>
                            <h3><a href="causes.html">Recycling For Charity</a></h3>
                            <p>It is a long established fact that a reader will be distracted.</p>
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
                        <h2>If You Want To Join With Us As a Volunteer. Contact Us Today!</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1 col-md-12 col-12">
                    <div class="cta-wrap">
                        <div class="cta-call">
                            <span>Call Us!</span>
                            <h3>00 968 469 876</h3>
                        </div>
                        <div class="cta-call">
                            <span>E-mail Us!</span>
                            <h3>support@gmail.com</h3>
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
                        <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
                                    <li><i class="ti-location-pin"></i> 968, Mudkarim, Pakistan.</li>
                                </ul>
                                <h2><a href="event.html">Fundrising event that could change some poor children.</a></h2>
                                <p>It is long estblished fact that a reader will be distracted aliquip exea commodo consequat velit esse cillum fugiat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-img">
                            <img src="{{asset('website/images/event/2.jpg')}}" alt="">
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
                                    <li><i class="ti-location-pin"></i> 968, Mudkarim, Pakistan.</li>
                                </ul>
                                <h2><a href="event.html">Many Children are suffering a lot for food.</a></h2>
                                <p>It is long estblished fact that a reader will be distracted aliquip exea commodo consequat velit esse cillum fugiat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-img">
                            <img src="{{asset('website/images/event/3.jpg')}}" alt="">
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
                                    <li><i class="ti-location-pin"></i> 968, Mudkarim, Pakistan.</li>
                                </ul>
                                <h2><a href="event.html">Be kind for the poor people and the kids.</a></h2>
                                <p>It is long estblished fact that a reader will be distracted aliquip exea commodo consequat velit esse cillum fugiat.</p>
                            </div>
                        </div>
                    </div>
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
                        <h2>Our Great Volunteer</h2>
                        <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point.</p>
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
                                <h2><a href="volunteer.html">Adriane Newby</a></h2>
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
                                <h2><a href="volunteer.html">Allene Castaneda</a></h2>
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
                                <h2><a href="volunteer.html">Malinda Willoughby</a></h2>
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
                                <h2><a href="volunteer.html">Wilburn Hatfield</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- volunteer-area start -->
    <!-- start testimonials-section-s2 -->
    <section class="testimonials-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="testimonials-slider">
                        <div class="testimonial-thumb-active">
                            <div class="test-img">
                                <img src="{{asset('website/images/testimonials/img-1.png')}}" alt>
                            </div>
                            <div class="test-img">
                                <img src="{{asset('website/images/testimonials/img-2.png')}}" alt>
                            </div>
                        </div>
                        <div class="testimonial-content-active text-center">
                            <div class="grid">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><span><i class="fa fa-star"></i></span></li>
                                    <li><span><i class="fa fa-star"></i></span></li>
                                </ul>
                                <p>“ There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a
                                    passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
                                    in the middle of text all the loss.</p>
                                <div class="info">
                                    <h5>Tawana Blackman</h5>
                                    <p>Volunteer</p>
                                </div>
                            </div>
                            <div class="grid">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><span><i class="fa fa-star"></i></span></li>
                                    <li><span><i class="fa fa-star"></i></span></li>
                                </ul>
                                <p>“Dicture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered”</p>
                                <div class="info">
                                    <h5>Michel Jhone</h5>
                                    <p>Volunteer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
        <div class="testi-shape">
            <img src="{{asset('website/images/testimonials/img-3.png')}}" alt="">
        </div>
        <div class="testi-shape2">
            <img src="{{asset('website/images/ts.png')}}" alt="">
        </div>
    </section>
    <!-- end testimonials-section-s2 -->
    <!-- blog-area start -->
    <div class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>Blog</span>
                        </div>
                        <h2>Our Latest News</h2>
                        <p>It is a long established fact that reader distracted by the the readable content off page looking at its layout point.</p>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="row">
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('website/images/blog/img-1.jpg')}}" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2><a href="blog.html">Best and less published their supplier lists.</a></h2>
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
                                <h2><a href="blog.html">Best and less published their supplier lists.</a></h2>
                            </div>
                            <div class="blog-img">
                                <img src="{{asset('website/images/blog/img-2.jpg')}}" alt="">
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
                                <h2><a href="blog.html">Best and less published their supplier lists.</a></h2>
                            </div>
                            <div class="blog-img">
                                <img src="{{asset('website/images/blog/img-3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('website/images/blog/img-4.jpg')}}" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>22 June, 2020</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2><a href="blog.html">Best and less published their supplier lists.</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <!-- start partners-section -->
    <section class="partners-section section-padding">
        <h2 class="hidden">Partners</h2>
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="partner-grids partners-slider">
                        <div class="grid">
                            <img src="{{asset('website/images/partners/1.png')}}" alt>
                        </div>
                        <div class="grid">
                            <img src="{{asset('website/images/partners/2.png')}}" alt>
                        </div>
                        <div class="grid">
                            <img src="{{asset('website/images/partners/3.png')}}" alt>
                        </div>
                        <div class="grid">
                            <img src="{{asset('website/images/partners/4.png')}}" alt>
                        </div>
                        <div class="grid">
                            <img src="{{asset('website/images/partners/5.png')}}" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end partners-section -->

</div>

@endsection


