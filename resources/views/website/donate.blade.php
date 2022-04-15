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

        <!-- start page-title -->
        <section class="page-title">
            <div class="page-title-container">
                <div class="page-title-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col col-xs-12">
                                <h2>Donate Now</h2>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Donate</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <!-- tp-event-area start -->
        <div class="tp-donation-page-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="section-title section-title2 text-center">
                            <div class="thumb-text">
                                <span>Donate</span>
                            </div>
                            <h2>Make a Donation</h2>
                        </div>
                        <div id="Donations" class="tab-pane">
                            <form action="{{route('event.test')}}" method="POST">
                                @csrf
                                <div class="tp-donations-amount">
                                    <h2>Your Donation</h2>
                                    <input type="text" class="form-control" name="text" id="text" placeholder="Enter Donation Amount">
                                </div>
                                <div class="tp-donations-details">
                                    <h2>Details</h2>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="name" id="fname" placeholder="First Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Last Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="text" class="form-control" name="Adress" id="Adress" placeholder="Adress">
                                        </div>
                                        <div class="col-lg-12 col-12 form-group">
                                            <textarea class="form-control" name="note" id="note" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-doanation-payment">
                                    <h2>Choose Your Payment Method</h2>
                                    <div class="tp-payment-area">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="tp-payment-option" id="open4">
                                                    <div class="tp-payment-select">
                                                        <ul>
                                                            <li class="addToggle">
                                                                <input id="add" type="radio" checked="checked" name="payment" value="30">
                                                                <label for="add">Payment By Card</label>
                                                            </li>
                                                            <li class="removeToggle">
                                                                <input id="remove" type="radio" name="payment" value="30">
                                                                <label for="remove">Offline Donation</label>
                                                            </li>
                                                        </ul>
                                                    </div>


                                                    <div id="open5" class="payment-name">
                                                        <ul>
                                                            <li class="visa"><input id="1" type="radio" name="size" value="30">
                                                                <label for="1"><img src="{{asset('website/images/checkout/img-1.png')}}" alt=""></label>
                                                            </li>
                                                            <li class="mas"><input id="2" type="radio" name="size" value="30">
                                                                <label for="2"><img src="{{asset('website/images/checkout/img-2.png')}}" alt=""></label>
                                                            </li>
                                                            <li class="ski"><input id="3" type="radio" name="size" value="30">
                                                                <label for="3"><img src="{{asset('website/images/checkout/img-3.png')}}" alt=""></label>
                                                            </li>
                                                            <li class="pay"><input id="4" type="radio" name="size" value="30">
                                                                <label for="4"><img src="{{asset('website/images/checkout/img-4.png')}}" alt=""></label>
                                                            </li>
                                                        </ul>
                                                        <div class="contact-form form-style">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-12 col-12">
                                                                    <label>Card holder Name</label>
                                                                    <input type="text" placeholder="" name="name">
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-12">
                                                                    <label>Card Number</label>
                                                                    <input type="text" placeholder="" name="card">
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-12">
                                                                    <label>CVV</label>
                                                                    <input type="text" placeholder="" name="CVV">
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-12">
                                                                    <label>Expire Date</label>
                                                                    <input type="text" placeholder="" name="date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn submit-btn">Donate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
