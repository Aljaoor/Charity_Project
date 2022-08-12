


<?php $__env->startSection('permissions'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div style="  position: absolute; right: 15px; top: 20px; font-size: 18px;">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
            <a class="btn btn-success" href="<?php echo e(route('roles.create')); ?>"> Create New Role</a>
        <?php endif; ?>
        </div>
    </div>
</div>


<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>


<table class="table table-bordered" style="margin-bottom: 70px;">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e(++$i); ?></td>
        <td><?php echo e($role->name); ?></td>
        <td>
            <a class="btn btn-info" href="<?php echo e(route('roles.show',$role->id)); ?>">Show</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('roles.edit',$role->id)); ?>">Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                <?php echo Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                <?php echo Form::close(); ?>

            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>


<?php echo $roles->render(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/roles/index.blade.php ENDPATH**/ ?>