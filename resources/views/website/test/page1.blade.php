@extends('website.layouts.main')

@section('content')


    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>About Us</h2>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>About</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <div class="volunteer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>Volunteer</span>
                        </div>
                        <h2>Our Great Volunteer</h2>
                        <p>It is a long established fact that reader distracted by the the readable content off page
                            looking at its layout point.</p>
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


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
