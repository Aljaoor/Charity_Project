
<nav class="navigation navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="{{asset('website/images/logo/logo.png')}}" alt="logo">الأمل<span> &nbsp;شعاع  </span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navigation-holder">
            <button class="close-navbar"><i class="ti-close"></i></button>
            <ul class="nav navbar-nav">
                <li><a class="active" href="{{ route('home') }}">home</a></li>
                <li><a class="active" href="about.html">About</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Causes +</a>
                    <ul class="sub-menu">
                        <li><a href="causes.html">Causes</a></li>
                        <li><a href="causes-single.html">Causes Single</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Event +</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('event.index')}}">Event</a></li>
                        <li><a href="{{route('event.add')}}">add Event</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages +</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About</a></li>
                        <li><a href="donate.html">Donate</a></li>
                        <li><a href="volunteer.html">Volunteer</a></li>
                        <li><a href="error.html">404 Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog +</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog right sidebar</a></li>
                        <li><a href="blog-left.html">Blog left sidebar</a></li>
                        <li><a href="blog-fulwidth.html">Blog fullwidth</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog details</a>
                            <ul class="sub-menu">
                                <li><a href="blog-single.html">Blog details right sidebar</a></li>
                                <li><a href="blog-single-left.html">Blog details left sidebar</a></li>
                                <li><a href="blog-single-fluid.html">Blog details fullwidth</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div><!-- end of nav-collapse -->
        <div class="cart-search-contact">
            <div class="mini-cart">
                <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-bag"></i> <span class="cart-count">02</span></button>
                <div class="mini-cart-content">
                    <div class="mini-cart-title">
                        <p>Shopping Cart</p>
                    </div>
                    <div class="mini-cart-items">
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-item-image">
                                <a href="#"><img src="{{asset('website/images/shop/mini/img-1.jpg')}}" alt="Hoodie with zipper"></a>
                            </div>
                            <div class="mini-cart-item-des">
                                <a href="#">Hoodie with zipper</a>
                                <span class="mini-cart-item-price">$25.15</span>
                                <span class="mini-cart-item-quantity">x 1</span>
                            </div>
                        </div>
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-item-image">
                                <a href="#"><img src="{{asset('website/assets/images/shop/mini/img-2.jpg')}}" alt="Hoodie with zipper"></a>
                            </div>
                            <div class="mini-cart-item-des">
                                <a href="#">Hoodie with zipper</a>
                                <span class="mini-cart-item-price">$12.99</span>
                                <span class="mini-cart-item-quantity">x 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="mini-cart-action clearfix">
                        <span class="mini-checkout-price">$255.12</span>
                        <a href="" class="theme-btn">View Cart</a>
                    </div>
                </div>
            </div>
            <div class="header-search-form-wrapper">
                <button class="search-toggle-btn"><i class="fi flaticon-magnifying-glass"></i></button>
                <div class="header-search-form">
                    <form>
                        <div>
                            <input type="text" class="form-control" placeholder="Search here...">
                            <button type="submit"><i class="fi flaticon-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="vollenter-btn">
                <a class="theme-btn-s2" href="{{route('user.create')}}">Join</a>
            </div>
            <div class="vollenter-btn">
            <button type="button" class="theme-btn-s2" data-toggle="modal" data-target="#exampleModalCenter" style="color: white; background: #2ebd61; width: 70px; height: 45px; ">
               log in
            </button>
            </div>
        </div>
    </div><!-- end of container -->
</nav>
<!-- Modal -->
<form action="{{ route('login') }}" method="post">
    @csrf
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">log in</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"   name="email" id="email" placeholder="your email..." style="height: 50px;">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" id="password" placeholder="ُpassword..." style="height: 50px;">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background: #2ebd61">log in</button>
            </div>
        </div>
    </div>
</div>
</form>
