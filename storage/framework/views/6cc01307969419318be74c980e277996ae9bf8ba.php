<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php if(config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false ): ?>
    <script src="<?php echo e($cdn ?? asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
<?php endif; ?>
<?php if(Session::has('alert.config')): ?>
    <?php if(config('sweetalert.animation.enable')): ?>
        <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <?php endif; ?>
    <?php if(config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false): ?>
        <script src="<?php echo e($cdn ?? asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <?php endif; ?>
    <script>
        Swal.fire(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>






<?php if($message = Session::get('error')): ?>
        <div class="alert alert-success">
            <p style="color: red; text-align: center;"><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <?php if($message = Session::get('alert')): ?>
        <script>

            swal({
                title: 'Thank you',
                text: "<?php echo Session::get('alert'); ?>",
                icon: "success",
                button: "ok!",
            });
        </script>
    <?php endif; ?>
<?php if($message = Session::get('status')): ?>
    <script>

        Swal.fire({
            title: "<?php echo Session::get('status'); ?>",
            width: 600,
            padding: '3em',
            color: '#716add',
            background: '#fff url(/images/trees.png)',
            backdrop: `
    rgba(123,0,0,0.6)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
        })
    </script>
<?php endif; ?>


<?php if($message = Session::get('volunteering')): ?>
    <script>

        swal({
            title: 'oops',
            text: "<?php echo Session::get('volunteering'); ?>",
            icon: "error",
            button: "close!",
        });
    </script>
<?php endif; ?>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p style="text-align: center;"><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
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
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12  grid col-12">
                    <div class="about-cercle">
                        <div class="about-img">
                            <img src="<?php echo e(asset('website/images/about/img-1.jpg')); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 grid  col-sm-12 col-12">
                    <div class="about-text">
                        <div class="section-title">
                            <h2> <span>Bright</span> <span>Of </span>Hope </h2>
                        </div>
                        <p>A development charity concerned with the care of orphaned children and Provides a helping hand and assistance to people in need, by collecting alms for them</p>
                        <div class="ab-icon-area">
                            <div class="about-icon-wrap">
                                <div class="about-icon-item">
                                    <div class="ab-icon">
                                        <img draggable="false" src="<?php echo e(asset('website/images/about/1.png')); ?>" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="">Save <br> Orphan</a></h2>
                                    </div>
                                </div>
                                <div class="about-icon-item">
                                    <div class="ab-icon ab-icon2">
                                        <img draggable="false" src="<?php echo e(asset('website/images/about/1.png')); ?>" alt="">
                                    </div>
                                    <div class="ab-text">
                                        <h2><a href="">save <br> Children</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ab-shape">
            <img src="<?php echo e(asset('website/images/shape/shape2.png')); ?>" alt="">
        </div>
    </div>
    <!-- about-area end -->
    <!-- features-area start -->
    <div class="features-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="features-text">
                        <div class="section-title">
                            <div class="thumb-text">
                                <span>Sponsorship</span>
                            </div>
                        </div>
                        <h2>You are the people of goodness,and we are its way</h2>
                        <p>Contribute now, donate to save thousands of lives and help them live a decent life and build their future.</p>
                        <a href="<?php echo e(url('donate')); ?>" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="features-wrap">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <img draggable="false" src="<?php echo e(asset('website/images/features/1.png')); ?>" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2>Orphan Sponsorship</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item-2">
                                    <div class="features-icon">
                                        <img draggable="false" src="<?php echo e(asset('website/images/features/icon.png')); ?>" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2>Student Sponsorship </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item-2">
                                    <div class="features-icon">
                                        <img draggable="false" src="<?php echo e(asset('website/images/features/img-4.png')); ?>" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2>family Sponsorship </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <img draggable="false" src="<?php echo e(asset('website/images/features/img-2.png')); ?>" alt="">
                                    </div>
                                    <div class="features-content">
                                        <h2>Elderly Sponsorship</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features-area end -->
    <!-- case-area-start -->
    <div class="case-area section-padding">
        <div  class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title section-title2 text-center">
                    <div class="thumb-text">
                        <span>Projects</span>
                    </div>
                    <h2> مشاريعنا الخيرية الربحية </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="<?php echo e(asset('website/images/cause/p4.jpg')); ?>" alt="">
                                <div class="case-btn">
                                    <a href="<?php echo e(url('donate')); ?>" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="<?php echo e(url('donate')); ?>">GOAL : 4 </a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                                <li><a href="<?php echo e(url('donate')); ?>">RISED : 1</a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                            </ul>
                            <h3><a href="<?php echo e(url('donate')); ?>"></a>عربة الطعام</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="<?php echo e(asset('website/images/cause/p2.jpg')); ?>" alt="">
                                <div class="case-btn">
                                    <a href="<?php echo e(url('donate')); ?>" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="<?php echo e(url('donate')); ?>">GOAL : 4 </a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                                <li><a href="<?php echo e(url('donate')); ?>">RISED : 1</a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                            </ul>

                            <h3><a href="<?php echo e(url('donate')); ?>">مطبخ بيت المونة</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="cause-item">
                        <div class="cause-top">
                            <div class="cause-img">
                                <img src="<?php echo e(asset('website/images/cause/p3.jpg')); ?>" alt="">
                                <div class="case-btn">
                                    <a href="<?php echo e(url('donate')); ?>" class="theme-btn">Donate Now<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cause-text">
                            <ul>
                                <li><a href="<?php echo e(url('donate')); ?>">GOAL : 4 </a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                                <li><a href="<?php echo e(url('donate')); ?>">RISED : 1</a>
                                    <a href="<?php echo e(url('donate')); ?>">millions S.P</a><br></li>
                            </ul>
                            <h3><a href="<?php echo e(url('donate')); ?>">مشغل الأمل</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case-area-end -->
    <!-- cta-area start -->

    <!-- cta-area start -->
    <!-- event-area start -->
    <div class="event-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>EVENTS</span>
                        </div>
                        <h2>Our Upcoming Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo e(route('event.index')); ?>">
                    <div class="event-item">
                        <div class="event-img">
                            <img style="min-width: 250px; max-width: 250px; min-height: 200px; max-height: 200px;" src="<?php echo e(asset('website/images/event/11.jpg')); ?>" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>MAR</span>
                                    <h4>28</h4>
                                </div>
                            </div>


                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 18:00 PM - 21:00 PM</li>
                                    <li><i class="ti-location-pin"></i> 968,  Homs,Syria.</li>
                                </ul>
                                <h2>التمرات</h2>
                                <p>توزيع التمر على الصائمين في حمص قبل أذان المغرب</p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="<?php echo e(route('event.index')); ?>">
                    <div class="event-item">
                        <div class="event-img">
                            <img style="min-width: 250px; max-width: 250px; min-height: 200px; max-height: 200px;"src="<?php echo e(asset('website/images/event/22.jpg')); ?>" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>JUN</span>
                                    <h4>12</h4>
                                </div>
                            </div>
                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 16:00 PM - 21:00 PM</li>
                                    <li><i class="ti-location-pin"></i> 968,  Homs,Syria.</li>
                                </ul>
                                <h2><a href="<?php echo e(route('event.index')); ?>">رداء الخير</a></h2>
                                <p>يستقبل الملابس الجديدة والمستعملة والأثاث الجديد والمستعمل ويعيد تأهليها ويتم توزيعها على المحتاجين والأرامل</p>
                            </div>
                        </div>
                    </div>
                    </a>
                        <a href="<?php echo e(route('event.index')); ?>">
                    <div class="event-item">
                        <div class="event-img">
                            <img style="min-width: 250px; max-width: 250px; min-height: 200px; max-height: 200px;"src="<?php echo e(asset('website/images/event/33.jpg')); ?>" alt="">
                        </div>
                        <div class="event-text">
                            <div class="event-left">
                                <div class="event-l-text">
                                    <span>MAR</span>
                                    <h4>7</h4>
                                </div>
                            </div>
                            <div class="event-right">
                                <ul>
                                    <li><i class="ti-location-pin"></i> 11:00 AM - 14:00 PM</li>
                                    <li><i class="ti-location-pin"></i> 968,  Homs,Syria.</li>
                                </ul>
                                <h2><a href="<?php echo e(route('event.index')); ?>"></a>لتبقى مدينتنا أجمل</h2>
                                <p>مبادرة تأهيل وتنظيف حديقة الكورنيش</p>
                            </div>
                        </div>
                    </div>

                        </a>
                </div>
            </div>
        </div>
        <div class="shape1"><img src="<?php echo e(asset('website/images/event//1.png')); ?>" alt=""></div>
        <div class="shape2"><img src="<?php echo e(asset('website/images/event//2.png')); ?>" alt=""></div>
    </div>
    <!-- event-area start -->
    <div class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>News</span>
                        </div>
                        <h2>Our Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="row">
                    <div class="col col-md-6 col-12" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="<?php echo e(asset('website/images/football2.jpg')); ?>" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>12<br>October<br>2022</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>78</li>
                                </ul>
                                <h2>تعلن جمعيتنا عن بدء التسجيل في فريق الأمل لكرة القدم</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-content">
                                <ul>
                                    <li>22  July<br> 2022</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>87</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>96</li>
                                </ul>
                                <h2>افتتاح مشغل لجمعية شعاع الأمل الخيرية </h2>
                            </div>
                            <div class="blog-img">
                                <img src="<?php echo e(asset('website/images/party.jpg')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <div class="blog-item">
                            <div class="blog-content">
                                <ul>
                                    <li>8<br>May <br>2022</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>56</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> 78</li>
                                </ul>
                                <h2>طفلة من متطوعات الأمل قررت جمع مصروفها في شهر رمضان كاملا وتقديمه كهدية عيد</h2>
                            </div>
                            <div class="blog-img">
                                <img src="<?php echo e(asset('website/images/girl.jpg')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="<?php echo e(asset('website/images/folowers.jpg')); ?>" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>22 <br>June<br> 2022</li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>43</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>56</li>
                                </ul>
                                <h2>اقامة الحفل الخيري السنوي الرابع لجمعية الأمل تحت شعار (الخير انتم أهله ونحن طريقه) </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- volunteer-area start -->
    <div class="volunteer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title section-title2 text-center">
                        <div class="thumb-text">
                            <span>Volunteer</span>
                        </div>
                        <h2>Our Great Team</h2>
                        <p>WebSite Programming Team from IT Albaath University</p>
                    </div>
                </div>
            </div>
            <div class="volunteer-wrap">
                <div class="row">
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="<?php echo e(asset('website/images/team/o.jpg')); ?>" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Omar Alsalkhadi</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="<?php echo e(asset('website/images/team/l.jpg')); ?>" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Layal Deeb</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="<?php echo e(asset('website/images/team/h.jpg')); ?>" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Hanan Fattoum</a></h2>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>


                    <div class="col col-md-3 col-sm-6 custom-grid col-12">
                        <div class="volunteer-item">
                            <div class="volunteer-img">
                                <img src="<?php echo e(asset('website/images/team/m.jpg')); ?>" alt="">
                            </div>
                            <div class="volunteer-content">
                                <h2><a href="volunteer.html">Mohammad Aljaoor</a></h2>
                                <span>Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- volunteer-area start -->
    <!-- start testimonials-section-s2 -->
    <!-- end testimonials-section-s2 -->
    <!-- blog-area start -->
    <!-- blog-area start -->
    <!-- start partners-section -->


























    <!-- end partners-section -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="cta-left">
                        <h2>If You Want To Join Us As a Volunteer. <a href="<?php echo e(url('join')); ?>"><br>
                                Click Here</a> </h2>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1 col-md-12 col-12">
                    <div class="cta-wrap">
                        <div class="cta-call">
                            <span>Call Us!</span>
                            <h3>+963 964 444 111</h3>
                        </div>
                        <div class="cta-call" style="margin-left: 100px; ">
                            <span>E-mail Us!</span>
                            <h3>    <a href = "mailto: project.4tth@gmail.com"> project.4tth@gmail.com</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/home.blade.php ENDPATH**/ ?>