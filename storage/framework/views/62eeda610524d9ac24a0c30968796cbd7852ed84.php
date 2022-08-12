

<?php $__env->startSection('content'); ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <?php if($message = Session::get('failed')): ?>
        <script>

            swal({
                title: 'oops',
                text: "<?php echo Session::get('failed'); ?>",
                icon: "error",
                button: "close!",
            });
        </script>
    <?php endif; ?>

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
                                <h2>Create a New Request </h2>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li>New Request</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <?php if(session()->has('Add')): ?>
            <div class="section-title section-title2 text-center" style="color: #2ebd61; background: #0b1c3c;">
                <div id="success">Thank you</div>
            </div>
        <?php endif; ?>
        <!-- volunteer-area-start -->
        <div class="volunteer-area ">
            <div class="volunteer-wrap section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="volunteer-contact">
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-bs-dismiss="alert">
                                            x
                                        </button>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>* <?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <p style="width: 1000px; text-align: right; color: midnightblue;">For proof, you can enter more than one file or photo, but please collect all the documents in one pdf file if possible.</p>
                                <div class="volunteer-contact-form" style="width: 1200px;">
                                    <form  action="<?php echo e(route('request_for_help.create')); ?>" method="post" class="contact-validation-active" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                                <input type="text" class="form-control" name="family_count" id="family_count" placeholder="ُEnter member your family count">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group form-group-in">
                                                <label for="file">Upload Event Image</label>
                                                <div  style="font-size: 10px; color: red">Attachment Format:jpeg ,.jpg , png ,pdf</div>
                                                <input id="file" type="file" class="<?php $__errorArgs = ['proof_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" name="proof_image[]" multiple accept=".jpg, .png, image/jpeg, image/png, pdf" >
                                                <i class="ti-cloud-up"></i>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                                <select name="office_id" id="office_id" class="form-control" required>
                                                    <option value="" selected disabled> chose an offices</option>
                                                    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($offices->id); ?>"><?php echo e($offices->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-12 form-group">
                                                <textarea class="form-control" name="reason_of_request" id="cancellation_reason" placeholder="Enter reason request"></textarea>
                                            </div>

                                            <div class="submit-area col-lg-12 col-12">
                                                <button type="submit" class="submit-btn" style="background-color:midnightblue; color: whitesmoke; border-radius: 20px; ">send Request</button>
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

        </div>
        <!-- volunteer-area-end -->

    </div>
    <!-- end of page-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/requests_for_help/add.blade.php ENDPATH**/ ?>