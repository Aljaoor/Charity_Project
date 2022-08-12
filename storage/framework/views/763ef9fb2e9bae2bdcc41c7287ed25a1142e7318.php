
<nav class="navigation navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>" style="font-size: 25px; font-family:    cursive ; padding-top: 13px;" ><img src="<?php echo e(asset('website/images/logo/logo.png')); ?>" alt="logo">Bright<span>Of</span>Hope</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navigation-holder">
            <button class="close-navbar"><i class="ti-close"></i></button>
            <ul class="nav navbar-nav">
                <li><a class="active" href="<?php echo e(route('home')); ?>">home</a></li>
                <li><a class="active" href="<?php echo e(route('about')); ?>">About</a></li>
                <li class="menu-item-has-children">
                    <a href="<?php echo e(route('office.show')); ?>">Offices +</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('office.show')); ?>">offices</a></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add office')): ?>
                            <li><a href="<?php echo e(route('office.add')); ?>">add office</a></li>

                        <?php endif; ?>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="<?php echo e(route('event.index')); ?>">Event +</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('event.index')); ?>">Event</a></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add event')): ?>
                            <li><a href="<?php echo e(route('event.add')); ?>">add Event</a></li>

                        <?php endif; ?>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="#">Request</a>
                    <ul class="sub-menu">
                        <?php if(auth()->user() and (auth()->user()->role_id==2  or auth()->user()->role_id==3) ): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send request help')): ?>
                                <li><a href="<?php echo e(route('request_for_help.add')); ?>">send request</a></li>

                            <?php endif; ?>
                            <li><a href="<?php echo e(route('request_for_help.yourRequest')); ?>">your request</a></li>
                        <?php elseif(auth()->user() and auth()->user()->role_id==1): ?>
                            <li><a href="<?php echo e(route('request_for_help.all')); ?>">All Request</a></li>

                            <li><a href="<?php echo e(route('request_for_help.Waiting')); ?>">Waiting</a></li>

                            <li><a href="<?php echo e(route('request_for_help.rejected')); ?>">Rejected</a></li>

                            <li><a href="<?php echo e(route('request_for_help.Beneficiaries')); ?>">Beneficiaries</a></li>

                        <?php endif; ?>


                    </ul>
                </li>
                <li><a href="<?php echo e(url('contact')); ?>">Contact</a></li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show volunteer request')): ?>


                <li class="menu-item-has-children">
                    <a href="#">Volunteer</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('eventsvolunteer.view')); ?>">all</a></li>

                        <li><a href="<?php echo e(route('eventsvolunteer.acceptable')); ?>">Acceptable</a></li>
                        <li><a href="<?php echo e(route('eventsvolunteer.rejected')); ?>">rejected</a></li>
                        <li><a href="<?php echo e(route('eventsvolunteer.pending')); ?>">pending</a></li>



                    </ul>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>



                <li class="menu-item-has-children">
                    <a>Permission </a>
                    <ul class="sub-menu">
                            <li><a href="<?php echo e(route('users.index')); ?>"> Manage users</a></li>
                            <li><a href="<?php echo e(route('roles.index')); ?>"> Manage roles</a></li>
                    </ul>
                </li>
                <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send request help')): ?>
                    <li class="menu-item-has-children">
                        <a href="#">Pages +</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(route('about')); ?>">About</a></li>
                            <li><a href="<?php echo e(url('donate')); ?>">Donate</a></li>
                            <li><a href="<?php echo e(url('404')); ?>">404 Page</a></li>
                        </ul>
                    </li>
                <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('volunteer')): ?>
                    <li class="menu-item-has-children">
                        <a href="#">Pages +</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(route('about')); ?>">About</a></li>
                            <li><a href="<?php echo e(url('donate')); ?>">Donate</a></li>
                            <li><a href="volunteer.html">Volunteer</a></li>
                            <li><a href="<?php echo e(url('404')); ?>">404 Page</a></li>
                        </ul>
                    </li>

                <?php endif; ?>

            </ul>


        </div><!-- end of nav-collapse -->





<?php if(auth()->user()): ?>
        <div class="cart-search-contact">
            <div class="mini-cart">
                <button class="cart-toggle-btn"> <img src="<?php echo e(asset('website/images/notfication.png')); ?>" style="width: 45px;"> <span class="cart-count"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span></button>
                <div class="mini-cart-content" style="width: 320px;">
                    <div class="mini-cart-title" style="background: #9aebff;">
                        <p>
                            Number of notifications :  <span class="mini-checkout-price" style="color: #2ebd61"><?php echo e(auth()->user()->unreadNotifications->count()); ?> </span>
                        </p>
                     </div>

                  <?php  $event_name= array();    $office_name= array();   ?>

                    <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($notification->data['id']=='accept'): ?>
                            <div style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image" >
                                       <img src="<?php echo e(asset('website/images/accept_request.png')); ?>" >
                                    </div>
                                    <a style=" min-width: 300px; min-width: 128.13px;" href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: #2db85d">
                                    <div class="mini-cart-item-des">
                                        <div style="color: #2db85d"> <?php echo e($notification->data['data']); ?> </div>
                                        <span style=""><?php echo e($notification->data['event']); ?></span>
                                        <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                    </div>
                                    </a>
                                </div>

                            </div>
                        <?php elseif($notification->data['id']=='accept_help'): ?>
                                <div style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                    <div class="mini-cart-item clearfix">
                                        <div class="mini-cart-item-image" >
                                            <img src="<?php echo e(asset('website/images/accept_request.png')); ?>" >
                                        </div>
                                        <a style=" min-width: 300px; min-width: 128.13px;" href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: #2db85d">
                                            <div class="mini-cart-item-des">
                                                <div style="color: #2db85d"> <?php echo e($notification->data['data']); ?> </div>
                                                <span style=""><?php echo e($notification->data['type']); ?></span>
                                                <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                        <?php elseif($notification->data['id']=='deny'): ?>
                            <div class="mini-cart-items"  style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <img src="<?php echo e(asset('website/images/deny.png')); ?>" alt="Hoodie with zipper">
                                    </div>
                                    <a href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: #c9302c">
                                    <div class="mini-cart-item-des">
                                        <?php echo e($notification->data['data']); ?>

                                        <span style="color: #1b6d85"><?php echo e($notification->data['event']); ?></span>

                                        <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        <?php elseif($notification->data['id']=='deny_help'): ?>
                            <div class="mini-cart-items"  style="margin-top: 10px; margin-bottom: 0px; padding-left: 10px;">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <img src="<?php echo e(asset('website/images/deny.png')); ?>" alt="Hoodie with zipper">
                                    </div>
                                    <a href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: #c9302c">
                                        <div class="mini-cart-item-des">
                                            <?php echo e($notification->data['data']); ?>

                                            <span style="color: #1b6d85"><?php echo e($notification->data['type']); ?></span>

                                            <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php elseif($notification->data['id']=='send'): ?>



                            <?php      $result = in_array( $notification->data['event'], $event_name);?>


                                <?php if($result==false): ?>


                                    <?php         array_push($event_name, $notification->data['event']); ?>

                                    <div class="mini-cart-items">
                                        <div class="mini-cart-item clearfix">
                                            <div class="mini-cart-item-image">
                                                <img src="<?php echo e(asset('website/images/OIP.jfif')); ?>" alt="Hoodie with zipper">
                                            </div>
                                            <a href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: black">
                                                <div class="mini-cart-item-des">
                                                    <span style="color: red"> <?php echo e(\App\Models\Event_volunteer::where('status', '3')->whereEventId( \App\Models\Event::whereTitle($notification->data['event'])->first()->id)->count()); ?></span>

                                                    <?php echo e($notification->data['data']); ?>

                                                    <span style="color: #1b6d85"><?php echo e($notification->data['event']); ?></span>
                                                    <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php echo e($notification->markAsRead()); ?>



                                <?php endif; ?>


                        <?php elseif($notification->data['id']=='send_help'): ?>



                            <?php      $result_help = in_array($notification->data['type'], $office_name);?>



                            <?php if($result_help==false): ?>


                                <?php         array_push($office_name, $notification->data['type']); ?>

                                <div class="mini-cart-items">
                                    <div class="mini-cart-item clearfix">
                                        <div class="mini-cart-item-image">
                                            <img src="<?php echo e(asset('website/images/OIP.jfif')); ?>" alt="Hoodie with zipper">
                                        </div>
                                        <a href="<?php echo e(route('eventsvolunteer.read_notification',$notification->id)); ?>" style="color: black">
                                            <div class="mini-cart-item-des">
                                                <span style="color: red"> <?php echo e(\App\Models\request_for_help::where('status', '3')->whereOfficeId( \App\Models\Office::whereName($notification->data['type'])->first()->id)->count()); ?></span>
                                                <?php echo e($notification->data['data']); ?>

                                                <span style="color: #1b6d85"><?php echo e($notification->data['type']); ?></span>
                                                <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php else: ?>
                                    <?php echo e($notification->markAsRead()); ?>




                                <?php endif; ?>


                        <?php else: ?>

                                                <div class="mini-cart-items">
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="<?php echo e(url('open_nitification')); ?>/<?php echo e($notification->data['id']); ?>/<?php echo e($notification->id); ?>"><img src="<?php echo e(asset('website/images/Accept.png')); ?>" alt="Hoodie with zipper"></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="<?php echo e(url('open_nitification')); ?>/<?php echo e($notification->data['id']); ?>/<?php echo e($notification->id); ?>"><?php echo e($notification->data['data']); ?>  <span style="color: #1b6d85"><?php echo e($notification->data['user']); ?></span></a>                                                            <span class="mini-cart-item-price"><?php echo e($notification->created_at); ?></span>
                                                            <span class="mini-cart-item-quantity" style="margin-top: 40px;">x 1</span>
                                                        </div>
                                                    </div>
                                                </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                                                <div class="mini-cart-action clearfix">
                                                    <a href="<?php echo e(route('mark')); ?>" class="theme-btn" style="background: #3ecfff;">mark all read</a>
                                                </div>
                                            </div>
                                        </div>


<?php endif; ?>
            <?php if(auth()->user()===null): ?>
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
                                        <a href="#"><img src="<?php echo e(asset('website/images/shop/mini/img-1.jpg')); ?>" alt="Hoodie with zipper"></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="#">You have to login</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php endif; ?>






















































            <div class="vollenter-btn">
                <a class="theme-btn-s2" href="<?php echo e(url('join')); ?>">Join</a>

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


<form action="<?php echo e(route('login')); ?>" method="post">
    <?php echo csrf_field(); ?>
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
                        <input id="email" type="email" class="form-control  is-invalid " name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="your email..." style="height: 50px; margin-bottom: 20px;">

                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                        </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control  is-invalid " name="password" required autocomplete="current-password" placeholder="your password..." style="height: 50px; margin-bottom: 20px;">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="row mb-3" style="margin-left: 15px;">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

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
<?php /**PATH D:\charity\Charity_Project\resources\views/website/layouts/header.blade.php ENDPATH**/ ?>