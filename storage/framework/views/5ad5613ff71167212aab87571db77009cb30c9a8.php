


<?php $__env->startSection('content'); ?>

    <div id="app">
        <main class="py-4">
            <div class="container">
                <?php echo $__env->yieldContent('permissions'); ?>
            </div>
        </main>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/layouts/main.blade.php ENDPATH**/ ?>