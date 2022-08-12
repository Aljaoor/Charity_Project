

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
                                <h2>Edit office</h2>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li>New Office</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>

        <div id="content">
            <!-- volunteer-area-start -->
            <div class="volunteer-area ">
                <div class="volunteer-wrap section-padding">
                    <div class="container">
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="volunteer-item">
                                        <div class="volunteer-img-wrap">
                                            <div class="volunter-img">
                                                <img src="<?php echo e(asset('website/images/Animals (70).jpg')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="volunteer-contact" >
                                        <div class="volunteer-contact-form">
                                            <form  action="<?php echo e(route('office.update')); ?>" method="post" class="contact-validation-active" enctype="multipart/form-data" style="height: 375px;" >
                                                <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                        <input type="text" class="form-control" name="name" id="name"   value="<?php echo e($office->name); ?>" placeholder="ُEnter name...">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                        <input type="text" class="form-control" name="family_count_condition"  value="<?php echo e($office->family_count_condition); ?>"  id="family_count_condition" placeholder="number of family members.." style="width: 250px;">
                                                    </div>


                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                        <input type="text" class="form-control" name="max_member_count" id="max_member_count"
                                                               value="<?php echo e($office->max_member_count); ?>"placeholder="ُEnter max member count..">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                        <input type="hidden" class="form-control" name="id" id="id"
                                                               value="<?php echo e($office->id); ?>"placeholder="ُEnter max member count..">
                                                    </div>
                                                    <div class="submit-area col-lg-12 col-12">
                                                        <button type="submit" class="theme-btn submit-btn">Update office</button>
                                                        <div id="loader">
                                                            <i class="ti-reload"></i>
                                                        </div>
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
                        </div>
                    </div>
                    <!-- volunteer-area start -->
                </div>
                <!-- volunteer-area-end -->
            </div>
        </div>
        <!-- end of page-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/office/edit.blade.php ENDPATH**/ ?>