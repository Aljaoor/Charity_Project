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
                                <h2>Our Events</h2>
                                <ol class="breadcrumb">
                                    <li><a class="active" href="<?php echo e(route('home')); ?>">home</a></li>
                                    <li>Events</li>
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
            <div class="section-title section-title2 text-center" style="color:orangered; background: #2ebd61">
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
                                <span>EVENTS</span>
                            </div>
                            <h2>Our  Events</h2>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">


                        <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(route('event.single',$event->id)); ?>">
                        <div class="event-item">
                            <div class="event-img">
                                <img style="min-width: 200px; max-width: 200px; min-height: 200px; max-height: 200px;" src="<?php echo e(asset('/Event_Attachments')); ?>/<?php echo e($event->id); ?>/<?php echo e($event->image); ?>" alt="">

                            </div>
                            <div class="event-text">
                                <div class="event-left">
                                    <div style="min-width: 110.06px; max-width: 110.06px; min-height: 200px; max-height: 200px; border-radius: 5px"  class="event-l-text">
                                        <?php
                                        $month=substr($event->from_date, 5, 2);
                                        ?>
                                        <span style="font-size: 20px; margin-left: 2000 px; padding-left: 20000 px;">

                                          <?php echo e(date("M", mktime(0, 0, 0,03, 10))); ?>

                                        </span>
                                        <h4>  <?php echo e(substr($event->from_date, 8, 2)); ?></h4>
                                    </div>
                                </div>
                                <div class="event-right">
                                    <ul>
                                        <li><i class="ti-location-pin"></i>9:00 AM - 10:00 AM </li>
                                        <li><i class="ti-location-pin"></i> <?php echo e($event->where); ?></li>
                                    </ul>
                                    <h2><?php echo e($event->title); ?> </h2>
                                    <p> <?php echo e($event->count_of_volunteers); ?> volunteers work free for you </p>
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

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/event/event.blade.php ENDPATH**/ ?>