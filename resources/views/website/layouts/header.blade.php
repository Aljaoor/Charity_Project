
<nav class="navigation navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}" style="font-size: 25px; font-family:    cursive ; padding-top: 13px;" ><img src="{{asset('website/images/logo/logo.png')}}" alt="logo">Bright<span>Of</span>Hope</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navigation-holder">
            <button class="close-navbar"><i class="ti-close"></i></button>
            <ul class="nav navbar-nav">
                <li><a class="active" href="{{ route('home') }}">home</a></li>
                <li><a class="active" href="{{route('about')}}">About</a></li>
                <li class="menu-item-has-children">
                    <a href="{{route('office.show')}}">Offices +</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('office.show')}}">offices</a></li>
                        @can('add office')
                            <li><a href="{{route('office.add')}}">add office</a></li>

                        @endcan
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{route('event.index')}}">Event +</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('event.index')}}">Event</a></li>
                        @can('add event')
                            <li><a href="{{route('event.add')}}">add Event</a></li>

                        @endcan
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="#">Request</a>
                    <ul class="sub-menu">
                        @if(auth()->user() and (auth()->user()->role_id==2  or auth()->user()->role_id==3) )
                            @can('send request help')
                                <li><a href="{{route('request_for_help.add')}}">send request</a></li>

                            @endcan
                            <li><a href="{{route('request_for_help.yourRequest')}}">your request</a></li>
                        @elseif(auth()->user() and auth()->user()->role_id==1)
                            <li><a href="{{route('request_for_help.all')}}">All Request</a></li>

                            <li><a href="{{route('request_for_help.Waiting')}}">Waiting</a></li>

                            <li><a href="{{route('request_for_help.rejected')}}">Rejected</a></li>

                            <li><a href="{{route('request_for_help.Beneficiaries')}}">Beneficiaries</a></li>

                        @endif


                    </ul>
                </li>
                <li><a href="{{url('contact')}}">Contact</a></li>
                @can('show volunteer request')


                <li class="menu-item-has-children">
                    <a href="#">Volunteer</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('eventsvolunteer.view')}}">all</a></li>

                        <li><a href="{{route('eventsvolunteer.acceptable')}}">Acceptable</a></li>
                        <li><a href="{{route('eventsvolunteer.rejected')}}">rejected</a></li>
                        <li><a href="{{route('eventsvolunteer.pending')}}">pending</a></li>



                    </ul>
                @endcan
                @can('role-list')



                <li class="menu-item-has-children">
                    <a>Permission </a>
                    <ul class="sub-menu">
                            <li><a href="{{route('users.index')}}"> Manage users</a></li>
                            <li><a href="{{route('roles.index')}}"> Manage roles</a></li>
                    </ul>
                </li>
                @elsecan('send request help')
                    <li class="menu-item-has-children">
                        <a href="#">Pages +</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{url('donate')}}">Donate</a></li>
                            <li><a href="{{url('404')}}">404 Page</a></li>
                        </ul>
                    </li>
                @elsecan('volunteer')
                    <li class="menu-item-has-children">
                        <a href="#">Pages +</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{url('donate')}}">Donate</a></li>
                            <li><a href="volunteer.html">Volunteer</a></li>
                            <li><a href="{{url('404')}}">404 Page</a></li>
                        </ul>
                    </li>

                @endcan

            </ul>


        </div><!-- end of nav-collapse -->



{{--      -----------------  notification------------------------------}}

@if(auth()->user())
        <div class="cart-search-contact">
            <div class="mini-cart">
                <button class="cart-toggle-btn"> <img src="{{asset('website/images/notfication.png')}}" style="width: 45px;"> <span class="cart-count">{{ auth()->user()->unreadNotifications->count() }}</span></button>
                <div class="mini-cart-content" style="width: 320px;">
                    <div class="mini-cart-title" style="background: #9aebff;">
                        <p>
                            Number of notifications :  <span class="mini-checkout-price" style="color: #2ebd61">{{ auth()->user()->unreadNotifications->count() }} </span>
                        </p>
                     </div>

                  <?php  $event_name= array();    $office_name= array();   ?>

                    @foreach(auth()->user()->unreadNotifications as $notification)

                        @if($notification->data['id']=='accept')
                            <div style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image" >
                                       <img src="{{asset('website/images/accept_request.png')}}" >
                                    </div>
                                    <a style=" min-width: 300px; min-width: 128.13px;" href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: #2db85d">
                                    <div class="mini-cart-item-des">
                                        <div style="color: #2db85d"> {{ $notification->data['data'] }} </div>
                                        <span style="">{{ $notification->data['event'] }}</span>
                                        <span class="mini-cart-item-price">{{ $notification->created_at }}</span>
                                    </div>
                                    </a>
                                </div>

                            </div>
                        @elseif($notification->data['id']=='accept_help')
                                <div style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                    <div class="mini-cart-item clearfix">
                                        <div class="mini-cart-item-image" >
                                            <img src="{{asset('website/images/accept_request.png')}}" >
                                        </div>
                                        <a style=" min-width: 300px; min-width: 128.13px;" href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: #2db85d">
                                            <div class="mini-cart-item-des">
                                                <div style="color: #2db85d"> {{ $notification->data['data'] }} </div>
                                                <span style="">{{ $notification->data['type'] }}</span>
                                                <span class="mini-cart-item-price">{{ $notification->created_at }}</span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                        @elseif($notification->data['id']=='deny')
                            <div class="mini-cart-items"  style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <img src="{{asset('website/images/deny.png')}}" alt="Hoodie with zipper">
                                    </div>
                                    <a href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: #c9302c">
                                    <div class="mini-cart-item-des">
                                        {{ $notification->data['data'] }}
                                        <span style="color: #1b6d85">{{ $notification->data['event'] }}</span>

                                        <span class="mini-cart-item-price">{{ $notification->created_at}}</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($notification->data['id']=='deny_help')
                            <div class="mini-cart-items"  style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <img src="{{asset('website/images/deny.png')}}" alt="Hoodie with zipper">
                                    </div>
                                    <a href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: #c9302c">
                                        <div class="mini-cart-item-des">
                                            {{ $notification->data['data'] }}
                                            <span style="color: #1b6d85">{{ $notification->data['type'] }}</span>

                                            <span class="mini-cart-item-price">{{ $notification->created_at}}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($notification->data['id']=='send')



                            <?php      $result = in_array( $notification->data['event'], $event_name);?>


                                @if($result==false)


                                    <?php         array_push($event_name, $notification->data['event']); ?>

                                    <div class="mini-cart-items">
                                        <div class="mini-cart-item clearfix">
                                            <div class="mini-cart-item-image">
                                                <img src="{{asset('website/images/OIP.jfif')}}" alt="Hoodie with zipper">
                                            </div>
                                            <a href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: black">
                                                <div class="mini-cart-item-des">
                                                    <span style="color: red"> {{ \App\Models\Event_volunteer::where('status', '3')->whereEventId( \App\Models\Event::whereTitle($notification->data['event'])->first()->id)->count()}}</span>

                                                    {{ $notification->data['data'] }}
                                                    <span style="color: #1b6d85">{{ $notification->data['event'] }}</span>
                                                    <span class="mini-cart-item-price">{{ $notification->created_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    {{$notification->markAsRead()}}


                                @endif


                        @elseif($notification->data['id']=='send_help')



                            <?php      $result_help = in_array($notification->data['type'], $office_name);?>



                            @if($result_help==false)


                                <?php         array_push($office_name, $notification->data['type']); ?>

                                <div class="mini-cart-items">
                                    <div class="mini-cart-item clearfix">
                                        <div class="mini-cart-item-image">
                                            <img src="{{asset('website/images/OIP.jfif')}}" alt="Hoodie with zipper">
                                        </div>
                                        <a href="{{route('eventsvolunteer.read_notification',$notification->id)}}" style="color: black">
                                            <div class="mini-cart-item-des">
                                                <span style="color: red"> {{ \App\Models\request_for_help::where('status', '3')->whereOfficeId( \App\Models\Office::whereName($notification->data['type'])->first()->id)->count()}}</span>
                                                {{ $notification->data['data'] }}
                                                <span style="color: #1b6d85">{{ $notification->data['type'] }}</span>
                                                <span class="mini-cart-item-price">{{ $notification->created_at }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @else
                                    {{$notification->markAsRead()}}



                                @endif


                        @else

                                                <div class="mini-cart-items">
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="{{ url('open_nitification')}}/{{ $notification->data['id']}}/{{ $notification->id }}"><img src="{{asset('website/images/Accept.png')}}" alt="Hoodie with zipper"></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="{{ url('open_nitification')}}/{{ $notification->data['id']}}/{{ $notification->id }}">{{ $notification->data['data'] }}  <span style="color: #1b6d85">{{ $notification->data['user'] }}</span></a>                                                            <span class="mini-cart-item-price">{{ $notification->created_at }}</span>
                                                            <span class="mini-cart-item-quantity" style="margin-top: 40px;">x 1</span>
                                                        </div>
                                                    </div>
                                                </div>
                        @endif
                    @endforeach





                                                <div class="mini-cart-action clearfix">
                                                    <a href="{{route('mark')}}" class="theme-btn" style="background: #3ecfff;">mark all read</a>
                                                </div>
                                            </div>
                                        </div>


@endif
            @if(auth()->user()===null)
                <div class="cart-search-contact">
                    <div class="mini-cart">
                        <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-bag"></i> <span class="cart-count">01</span></button>
                        <div class="mini-cart-content">
                            <div class="mini-cart-title">
                                <p style="color: #2db85d">Notification</p>
                            </div>
                            <div class="mini-cart-items">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <a href="#"><img src="{{asset('website/images/shop/mini/img-1.jpg')}}" alt="Hoodie with zipper"></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="#">You have to login</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            @endif
{{--                    @if(auth()->user()===null)--}}
{{--                        <div class="cart-search-contact">--}}
{{--                            <div class="mini-cart">--}}
{{--                                <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-bag"></i> <span class="cart-count">01</span></button>--}}
{{--                                <div class="mini-cart-content">--}}
{{--                                    <div class="mini-cart-title">--}}
{{--                                        <p>Shopping Cart</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="mini-cart-items">--}}
{{--                                        <div class="mini-cart-item clearfix">--}}
{{--                                            <div class="mini-cart-item-image">--}}
{{--                                                <a href="#"><img src="{{asset('website/images/shop/mini/img-1.jpg')}}" alt="Hoodie with zipper"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="mini-cart-item-des">--}}
{{--                                                <a href="#">Hoodie with zipper</a>--}}
{{--                                                <span class="mini-cart-item-price">$25.15</span>--}}
{{--                                                <span class="mini-cart-item-quantity">x 1</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="mini-cart-item clearfix">--}}
{{--                                            <div class="mini-cart-item-image">--}}
{{--                                                <a href="#"><img src="{{asset('website/assets/images/shop/mini/img-2.jpg')}}" alt="Hoodie with zipper"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="mini-cart-item-des">--}}
{{--                                                <a href="#">Hoodie with zipper</a>--}}
{{--                                                <span class="mini-cart-item-price">$12.99</span>--}}
{{--                                                <span class="mini-cart-item-quantity">x 2</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mini-cart-action clearfix">--}}
{{--                                        <span class="mini-checkout-price">$255.12</span>--}}
{{--                                        <a href="" class="theme-btn">View Cart</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endif--}}


{{--   ------------------------------                       search button     -------------                   --}}

{{--                    --}}
{{--            <div class="header-search-form-wrapper">--}}
{{--                <button class="search-toggle-btn"><i class="fi flaticon-magnifying-glass"></i></button>--}}
{{--                <div class="header-search-form">--}}
{{--                    <form>--}}
{{--                        <div>--}}
{{--                            <input type="text" class="form-control" placeholder="Search here...">--}}
{{--                            <button type="submit"><i class="fi flaticon-magnifying-glass"></i></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="vollenter-btn">
                <a class="theme-btn-s2" href="{{url('join')}}">Join</a>

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
                <h2 class="modal-title" id="exampleModalLongTitle" style="color: #2db85d">log in</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control  is-invalid " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your email..." style="height: 50px; margin-bottom: 20px;">

                      @error('email')
                       <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control  is-invalid " name="password" required autocomplete="current-password" placeholder="your password..." style="height: 50px; margin-bottom: 20px;">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3" style="margin-left: 15px;">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background: #2ebd61">log in</button>
            </div>
        </div>
    </div>
</form>
