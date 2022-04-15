




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
                                <h2>Contact Us</h2>
                                <ol class="breadcrumb">
                                    <li><a href="{{route("home")}}">Home</a></li>
                                    <li>Contact</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <!-- start contact-pg-contact-section -->
        <section class="contact-pg-contact-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="section-title-s3 section-title-s5">
                            <h2>Note:</h2>
                        </div>
                        <div class="contact-details">
                            <p>If you have a problem or want to help,
                                you can contact us and you will receive a response as soon as possible.
                            </p>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <h5>Our Location</h5>
                                    <p>Syria , Homs , City Center</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ti-mobile"></i>
                                    </div>
                                    <h5>Phone</h5>
                                    <p>+963 964 444 111</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="ti-email"></i>
                                    </div >
                                    <a href = "mailto: project.4tth@gmail.com">
                                    <h5>Email</h5>
                                    <p>project.4tth@gmail.com</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="contact-form-area">
                            <div class="section-title-s3 section-title-s5">
                                <h2>Send Your Massege</h2>
                            </div>
                            <div class="contact-form">
                                <form method="post" class="contact-validation-active" id="contact-form">
                                    <div>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name*">
                                    </div>
                                    <div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*">
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address*">
                                    </div>
                                    <div class="comment-area">
                                        <textarea name="note" id="note" placeholder="Case description*"></textarea>
                                    </div>
                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn">Submit Now</button>
                                        <div id="loader">
                                            <i class="ti-reload"></i>
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

                <div class="row">
                    <div class="col col-xs-12">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d409.8683260188391!2d36.705975302312005!3d34.73174017530005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15230f102155eb95%3A0x440a134552dbff91!2z2KzZhdi52YrYqSDYtNi52KfYuSDYp9mE2KPZhdmEINin2YTYrtmK2LHZitip!5e0!3m2!1sar!2s!4v1649964370535!5m2!1sar!2s"  allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>

    </div>
@endsection
