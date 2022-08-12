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
                                <h2>Our Offices</h2>
                                <ol class="breadcrumb">
                                    <li><a class="active" href="{{ route('home') }}">home</a></li>
                                    <li>Offices</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        @if ($message = Session::get('add'))
            <div class="alert alert-success">
                <p style="margin-left: 600px;">{{ $message }}</p>
            </div>
        @endif
        @if(session()->has('delete'))
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61">
                <strong>{{ session()->get('delete') }}</strong>
                {{--                <div id="error"> Error occurred while sending email. Please try again later. </div>--}}
            </div>
        @endif
        @if(session()->has('edit'))
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61" >
                <strong>{{ session()->get('edit') }}</strong>
                {{--                <div id="error"> Error occurred while sending email. Please try again later. </div>--}}
            </div>
          @endif
        <!-- event-area start -->
        <div class="event-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title section-title2 text-center">
                            <div class="thumb-text">
                                <span>offices</span>
                            </div>
                            <h2>Our  offices</h2>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">

{{--       ========================  start event                 ========================--}}
                        @foreach($office as $office)


                             @can('edit office')
                                <a style="height: 50px; " class="theme-btn submit-btn" href="{{route('office.edit',$office->id)}}">Edit</a>

                             @endcan
                             @can('delete office')
                                     <a style="height: 50px;" class="theme-btn submit-btn" href="{{route('office.delete',$office->id)}}">delete</a>

                             @endcan


                            <div class="event-item" >

                                <div class="event-text" >

                                <div class="event-left">
                                    <div class="event-l-text" style="" >
                                        <span>Office Name</span>
                                        <h4>{{$office->name }} </h4>
                                    </div>
                                </div>
                                <div class="event-right">

                                        <h2>Maximum number of people the office can help     <span style="color: #1b6d85"> {{ $office->max_member_count }}</span>
                                        </h2>



                                    <h2>number of families helped by this office :  <span style="color: #1b6d85"> {{App\Models\Beneficiary::whereOfficeId($office->id)->count();}}</span></h2>
                                </div>
                            </div>
                        </div>
                        </a>
                      @endforeach
{{--       ========================  end div event                 ========================--}}

                    </div>
                </div>
            </div>
            <div class="shape1"><img src="{{asset('website/images/event/1.png')}}" alt=""></div>
            <div class="shape2"><img src="{{asset('website/images/event/2.png')}}" alt=""></div>
        </div>
        <!-- event-area start -->


    </div>
    <!-- end of page-wrapper -->
@endsection
