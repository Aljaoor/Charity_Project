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
                                <h2>Our Offices</h2>
                                <ol class="breadcrumb">
                                    <li><a class="active" href="<?php echo e(route('home')); ?>">home</a></li>
                                    <li>Offices</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <?php if($message = Session::get('add')): ?>
            <div class="alert alert-success">
                <p style="margin-left: 600px;"><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <?php if(session()->has('delete')): ?>
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61">
                <strong><?php echo e(session()->get('delete')); ?></strong>
                
            </div>
        <?php endif; ?>
        <?php if(session()->has('edit')): ?>
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61" >
                <strong><?php echo e(session()->get('edit')); ?></strong>
                
            </div>
          <?php endif; ?>
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


                        <?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit office')): ?>
                                <a style="height: 50px; " class="theme-btn submit-btn" href="<?php echo e(route('office.edit',$office->id)); ?>">Edit</a>

                             <?php endif; ?>
                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete office')): ?>
                                     <a style="height: 50px;" class="theme-btn submit-btn" href="<?php echo e(route('office.delete',$office->id)); ?>">delete</a>

                             <?php endif; ?>


                            <div class="event-item" >

                                <div class="event-text" >

                                <div class="event-left">
                                    <div class="event-l-text" style="" >
                                        <span>Office Name</span>
                                        <h4><?php echo e($office->name); ?> </h4>
                                    </div>
                                </div>
                                <div class="event-right">

                                        <h2>Maximum number of people the office can help     <span style="color: #1b6d85"> <?php echo e($office->max_member_count); ?></span>
                                        </h2>



                                    <h2>number of families helped by this office :  <span style="color: #1b6d85"> <?php echo e(App\Models\Beneficiary::whereOfficeId($office->id)->count()); ?></span></h2>
                                </div>
                            </div>
                        </div>
                        </a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>
            </div>
            <div class="shape1"><img src="<?php echo e(asset('website/images/event/1.png')); ?>" alt=""></div>
            <div class="shape2"><img src="<?php echo e(asset('website/images/event/2.png')); ?>" alt=""></div>
        </div>
        <!-- event-area start -->


    </div>
    <!-- end of page-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/office/office.blade.php ENDPATH**/ ?>