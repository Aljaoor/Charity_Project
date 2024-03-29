


<?php $__env->startSection('content'); ?>
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
                                <h2>welcome</h2>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li>join us</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <form method="POST" action="<?php echo e(route('register')); ?>"class="contact-validation-active" enctype="multipart/form-data" >
        <?php echo csrf_field(); ?>
        <!-- volunteer-area-start -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <h2>How do you want to join?</h2>
                        <p>
                            <label class="theme-btn submit-btn" >
                                <input checked name="role_id" type="radio" value="2" id="type_div">
                                <span class="theme-btn submit-btn">user</span></label>
                            <label class="theme-btn submit-btn" style="margin-left: 50px;" >
                                <input name="role_id" type="radio" value="3" id="type_div">
                                <span class="theme-btn submit-btn">volunteer</span></label>

                        </p>
                    </div>
                </div>
            </div>
            <!-- volunteer-area-end -->
            <div class="volunteer-area ">
                <div class="volunteer-wrap section-padding">
                    <div class="container">
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="volunteer-item">
                                        <div class="volunteer-img-wrap">
                                            <div class="volunter-img">
                                                <img src="<?php echo e(asset('website/images/volunteer.jpg')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="volunteer-contact">
                                        <div class="volunteer-contact-form">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="row" style="height: 385px;">
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>"
                                                       required autocomplete="name" autofocus placeholder="your name..." style="height: 50px;">

                                                    <?php $__errorArgs = ['name'];
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
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                    <input type="number" class="form-control" name="age" id="age" placeholder="your age..." style="height: 50px;">
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>"
                                                       required autocomplete="email" placeholder="your email..." style="height: 50px;">

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

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                                       required autocomplete="new-password" placeholder="your passwoad..." style="height: 50px;">

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
                                                <div class="col-md-6" style="margin-top: 33px;">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                                       required autocomplete="new-password" placeholder="confirg password..." style="height: 50px;">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group" style="margin-top: 33px;">
                                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="your Number..." style="height: 50px;">
                                                    <label for="mobile" style="font-size: 15px; color: #5cb85c; "> strat +963 So we can contact you on whatsapp</label>

                                                </div>
                                                <div class="submit-area col-lg-12 col-12">
                                                    <button type="submit" class="theme-btn submit-btn">send</button>
                                                    <div id="loader">
                                                        <i class="ti-reload"></i>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- volunteer-area-end -->

    </div>
    <!-- end of page-wrapper -->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/auth/register.blade.php ENDPATH**/ ?>