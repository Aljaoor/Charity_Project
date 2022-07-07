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
                                <h2>Your Requests</h2>
                                <ol class="breadcrumb">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li>New Office</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>

        <div id="content">
            <!-- volunteer-area-start -->
            <div class="volunteer-area ">
                <div class="volunteer-wrap section-padding">
                    <div class="container">
                        <div class="row">

                        @if(empty($status[0]))


                                <h1 style="color: red; text-align: center;">You don't have requests. </h1>


                            @else



                                <table style="text-align: center;width:100%; border: 1px #2db85d solid;padding:0px; ">
                                    <tr  style="background: #3ac060 ;padding-left:0px;  border: 1px;" >

                                        <th style="text-align: center;">your request</th>
                                        <th style="text-align: center;"> status</th>
                                        <th style="text-align: center;"> caceltion reason</th>
                                        <th style="text-align: center;">event name</th>


                                    </tr>



                                    @php $i=0; @endphp

                                    @foreach($status as $status)
                                        @php $i++; @endphp
                                        <tr style="padding:20px; width:200px;">
                                            <td style="  width: 200px"> {{$i}}</td>
                                            @if($status->status==3)
                                                <td style="padding:10px; width:150px; color: purple">pending </td>
                                            @elseif ($status->status==1)
                                                <td style="padding:10px; width:100px; color: #2db85d">accept </td>
                                            @elseif ($status->status==2)
                                                <td style="padding:10px; width:100px; color: red">rejected </td>
                                            @endif

                                            <td style="padding:50px; width:200px">{{$status->cancellation_reason}} </td>
                                            <td style="padding:20px; width:150px">{{$status->event->title}} </td>



                                        </tr>

                                    @endforeach

                                </table>

                        @endif


                        </div>
                    </div>
                    <!-- volunteer-area start -->
                </div>
                <!-- volunteer-area-end -->
            </div>
        </div>
        <!-- end of page-wrapper -->

@endsection
