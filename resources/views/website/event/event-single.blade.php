﻿@extends('website.layouts.main')
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
                                <h2> {{$event->title}}  </h2>
                                <ol class="breadcrumb">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>Event</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <!-- tp-event-details-area start -->
        <div class="tp-case-details-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8">
                        <div class="tp-case-details-wrap">
                            <div class="tp-case-details-text">
                                <div id="Description">
                                    <div class="tp-case-details-img">
                                        <img src="{{asset('/Event_Attachments')}}/{{$event->id}}/{{$event->image}}" alt="">
                                    </div>
                                    <div class="tp-case-content">
                                        <div class="tp-case-text-top">
                                            <h2>{{$event->title}} </h2>
                                            <div class="case-b-text">
                                                <p> start at :{{$event->from_date}} </p>
                                                <p> end in :{{$event->to_date}}  </p>
                                                <p> عدد المتوعين المشاركين :{{$event->count_of_volunteers}}  </p>
                                            </div>
                                            <div class="case-bb-text">
                                                <h3>وصف الحدث</h3>
                                                <p>{{$event->describe}} .</p>
                                                <ul>
                                                    <li>Save The Children’s Role In Fight Against Malnutrition Hailed</li>
                                                    <li>Charity Can Help Make Smile Of Poor People</li>
                                                    <li>Else he endures pains to avoid worse pains.</li>
                                                    <li>We denounce with righteous indignation and dislike men. </li>
                                                    <li>Financial Help For Poor Families</li>
                                                </ul>
                                            </div>
                                            <div class="case-bb-text">
                                                <h3>Event Loacation</h3>
                                                <div id="Map" class="tab-pane">
                                                    <div class="contact-map">

                                                        <iframe src="{{$event->location}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="submit-area sub-btn" style="margin-left: 40%;">
                                    <a href="donate.html" class="theme-btn submit-btn">Donate Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 col-sm-12">
                        <div class="tp-blog-sidebar">
                            <div class="widget search-widget">
                                <h3>Search Here</h3>
                                <form>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Search Post..">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget recent-post-widget">
                                <h3>Recent posts</h3>
                                <div class="posts">
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{asset('website/images/recent-posts/img-1.jpg')}}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="#">Many Children are suffering a lot for food.</a></h4>
                                            <span class="date">22 Sep 2020</span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{asset('website/images/recent-posts/img-2.jpg')}}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="#">Be kind for the poor people and the kids.</a></h4>
                                            <span class="date">22 Sep 2020</span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{asset('website/images/recent-posts/img-3.jpg')}}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="#">Be soft and kind for the poor people.</a></h4>
                                            <span class="date">22 Sep 2020</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget tag-widget">
                                <h3>Tags</h3>
                                <ul>
                                    <li><a href="#">Donations</a></li>
                                    <li><a href="#">Charity</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Non Profit</a></li>
                                    <li><a href="#">Poor People</a></li>
                                    <li><a href="#">Helping Hand</a></li>
                                    <li><a href="#">Video</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-event-details-area end -->
    </div>
    <!-- end of page-wrapper -->

@endsection


