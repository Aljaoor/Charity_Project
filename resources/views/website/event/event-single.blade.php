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
        @if(session()->has('delete_image'))
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61">
                <strong>{{ session()->get('delete_image') }}</strong>
                {{--                <div id="error"> Error occurred while sending email. Please try again later. </div>--}}
            </div>
        @endif
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
                                                <p>start at :{{$event->from_date}} </p>
                                                <p> end in :{{$event->to_date}}  </p>
                                                <p> number of volunteer :{{$event->count_of_volunteers}}  </p>
                                            </div>
                                            <div class="case-bb-text">
                                                <h3 style="color:red">Event Description</h3>
                                                <p>{{$event->describe}} .</p>
                                            </div>
                                            <div class="case-bb-text">
                                                <h3 style="color:red">Event Loacation</h3>
                                                <div id="Map" class="tab-pane">
                                                    <div class="contact-map">

                                                        <iframe src="{{$event-> location}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="submit-area sub-btn" style="margin-left: 40%;">
                                    <a href="{{url('donate')}}" class="theme-btn submit-btn">Donate Now</a>
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
{{--                            <div class="widget recent-post-widget">--}}
{{--                                <h3>Recent posts</h3>--}}
{{--                                <div class="posts">--}}
{{--                                    <div class="post">--}}
{{--                                        <div class="img-holder">--}}
{{--                                            <img src="{{asset('website/images/recent-posts/img-1.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="details">--}}
{{--                                            <h4><a href="#">Many Children are suffering a lot for food.</a></h4>--}}
{{--                                            <span class="date">22 Sep 2020</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="post">--}}
{{--                                        <div class="img-holder">--}}
{{--                                            <img src="{{asset('website/images/recent-posts/img-2.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="details">--}}
{{--                                            <h4><a href="#">Be kind for the poor people and the kids.</a></h4>--}}
{{--                                            <span class="date">22 Sep 2020</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="post">--}}
{{--                                        <div class="img-holder">--}}
{{--                                            <img src="{{asset('website/images/recent-posts/img-3.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="details">--}}
{{--                                            <h4><a href="#">Be soft and kind for the poor people.</a></h4>--}}
{{--                                            <span class="date">22 Sep 2020</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="widget tag-widget">
                                <h3>option</h3>
                                <ul>
                                    <button type="button" class="theme-btn submit-btn" data-toggle="modal" data-target="#exampleModal">
                                        <li><a>Delete Event</a></li>
                                    </button>
                                    <li class="theme-btn submit-btn"><a href="{{route('event.edit',$event->id)}}">Edit</a></li>
                                    <li class="theme-btn submit-btn"><a href="{{route('events_attachment.show',$event->id)}}">show image</a></li>
                                    <li class="theme-btn submit-btn"><a href="{{route('events_attachment.download',$event->id)}}">download image</a></li>
                                    <li class="theme-btn submit-btn"><a href="{{route('events_attachment.delete',$event->id)}}">delete image</a></li>
                                    @if($event->can_enrol)
                                        <li class="theme-btn submit-btn"><a href="{{route('eventsvolunteer.volunteering',$event->id)}}">volunteering</a></li>
{{--                                    @else--}}
{{--                                        <li class="theme-btn submit-btn">send</li>--}}


                                    @endif

                                    <li class="theme-btn submit-btn"><a href="{{route('contact')}}">contact</a></li>

                                </ul>
                            </div>
                            <!-- Modal -->
                            <form action="{{route('event.delete',$event->id)}}" method="get">
                                {{ csrf_field() }}
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"   style="color: red;">Confirm The Deletion Process</h3>
                                            <input type="hidden" name="id" id="id_file" value="{{$event->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="theme-btn submit-btn" data-dismiss="modal">Close</button>
                                            <button type="submit" class="theme-btn submit-btn">Delete</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-event-details-area end -->
    </div>
    <!-- end of page-wrapper -->

@endsection


