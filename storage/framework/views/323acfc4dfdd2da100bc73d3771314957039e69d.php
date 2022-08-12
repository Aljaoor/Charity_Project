


<?php $__env->startSection('permissions'); ?>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div style="  position: absolute;
    top: 25px;
  right: 100px;
  font-size: 18px;">
            <a class="btn btn-primary" href="<?php echo e(route('roles.index')); ?>"> Back</a>
        </div>
    </div>
</div>


<div class="row" style="margin-bottom: 50px;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <?php echo e($role->name); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="font-size: 18px;">
            <strong>Permissions:</strong>
            <?php if(!empty($rolePermissions)): ?>
                <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="label label-success"><?php echo e($v->name); ?>,</label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/roles/show.blade.php ENDPATH**/ ?>