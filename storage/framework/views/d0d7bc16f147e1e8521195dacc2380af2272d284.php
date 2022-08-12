

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
                                <h2>Your Requests</h2>
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

                        <?php if(empty($status[0])): ?>


                                <h1 style="color: red; text-align: center;">You don't have requests. </h1>


                            <?php else: ?>



                                <table style="text-align: center;width:100%; border: 1px #2db85d solid;padding:0px; ">
                                    <tr  style="background: #3ac060 ;padding-left:0px;  border: 1px;" >

                                        <th style="text-align: center;">your request</th>
                                        <th style="text-align: center;"> status</th>
                                        <th style="text-align: center;"> caceltion reason</th>
                                        <th style="text-align: center;">type of help</th>


                                    </tr>



                                    <?php $i=0; ?>

                                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $i++; ?>
                                        <tr style="padding:20px; width:200px;">
                                            <td style="  width: 200px"> <?php echo e($i); ?></td>
                                            <?php if($status->status==3): ?>
                                                <td style="padding:10px; width:150px; color: purple">pending </td>
                                            <?php elseif($status->status==1): ?>
                                                <td style="padding:10px; width:100px; color: #2db85d">accept </td>
                                            <?php elseif($status->status==2): ?>
                                                <td style="padding:10px; width:100px; color: red">rejected </td>
                                            <?php endif; ?>

                                            <td style="padding:50px; width:200px"><?php echo e($status->cancellation_reason); ?> </td>

                                            <?php if(\App\Models\Beneficiary::whereMemberId(\auth()->user()->id)->whereOfficeId($status->office_id)->exists()): ?>

                                                <td style="padding:20px; width:150px">
                                               <?php echo e(\App\Models\Beneficiary::whereMemberId(\auth()->user()->id)->whereOfficeId($status->office_id)->first()->help); ?>


                                                </td>
                                            <?php endif; ?>






                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>

                        <?php endif; ?>


                        </div>
                    </div>
                    <!-- volunteer-area start -->
                </div>
                <!-- volunteer-area-end -->
            </div>
        </div>
        <!-- end of page-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/requests_for_help/yourRequest.blade.php ENDPATH**/ ?>