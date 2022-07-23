

<div class="tp-upper-footer">
    <div class="container">
        <div class="row">
            <div class="col col-lg-3 col-md-3 col-sm-6">
                <div class="widget about-widget">
                    <div class="footer-logo widget-title">
                        <a href="index.html" style="font-size: 20px; font-family:    cursive ; "><img src="{{asset('website/images/logo/logo.png')}}" alt="logo">Bright<span>Of</span>Hope</a>
                    </div>
                    <p>Build and Earn with your online store with lots of cool and exclusive tp-features </p>
                    <ul>
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-google"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col col-lg-2 col-md-3 col-sm-6">
                <div class="widget link-widget">
                    <div class="widget-title">
                        <h3>Useful Links</h3>
                    </div>
                    <ul>
{{--             ---------------           log out button--}}
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="causes.html">Our Causes</a></li>
                        <li><a href="volunteer.html">Our Volunteer</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="event.html">Our Event</a></li>
                    </ul>                            </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="col col-lg-3 col-lg-offset-1 col-md-3 col-sm-6">
                <div class="widget market-widget tp-service-link-widget">
                    <div class="widget-title">
                        <h3>Contact </h3>
                    </div>
                    <p>online store with lots of cool and exclusive tp-features</p>
                    <div class="contact-ft">
                        <ul>
                            <li><i class="fi flaticon-pin"></i>28 Street, New York City, USA</li>
                            <li><i class="fi flaticon-call"></i>+000123456789</li>
                            <li><i class="fi flaticon-envelope"></i>khairah@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-3 col-sm-6">
                <div class="widget instagram">
                    <div class="widget-title">
                        <h3>Instagram</h3>
                    </div>
                    <ul class="d-flex">
                        <li><a href="#"><img src="{{asset('website/images/instragram/1.jpg')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('website/images/instragram/2.jpg')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('website/images/instragram/3.jpg')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('website/images/instragram/4.jpg')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('website/images/instragram/5.jpg')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('website/images/instragram/6.jpg')}}" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</div>
<div class="tp-lower-footer">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <p class="copyright">&copy; 2022 Brught Of Hope always with you</p>
            </div>
        </div>
    </div>
</div>
