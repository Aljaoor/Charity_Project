
<?php $__env->startSection('content'); ?>




    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    <form action="<?php echo e(route('request_for_help.search_office')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button type="submit" class="theme-btn" style="height: 30px;padding-top: 3px;">search</button>
        <div class="col-md-3" style="margin-left: 500px; margin-top: 0px; margin-bottom: 0px;">
            <select  class="form-control" name="search" required  autofocus style="height: 30px; margin-bottom: 20px;">
                <option value="" selected disabled> <?php echo e($office_name??"Choose an event"); ?></option>
                <option value="all"> All offices</option>

            <?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($office->name); ?>" ><?php echo e($office->name); ?> </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input type="hidden" value="2" name="status">
        </div>
    </form>



    <form id="form1" runat="server">


        <table id="example" class="display" style="width:100%;">
            <thead style="background-color: #3ac060;">
            <tr>
                <th>Name</th>
                <th>family count</th>
                <th>Office</th>
                <th>age</th>
                <th>mobile</th>
                <th>status</th>
                <th style="text-align: center">details</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $request_Waiting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_Waiting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td><?php echo e($request_Waiting->user->name); ?></td>
                    <td><?php echo e($request_Waiting->family_count); ?></td>
                    <td><?php echo e($request_Waiting->office->name); ?></td>
                    <td><?php echo e($request_Waiting->user->age); ?></td>
                    <td><?php echo e($request_Waiting->user->mobile); ?></td>

                    <?php if($request_Waiting->status==3): ?>
                        <td> pending </td>
                    <?php elseif($request_Waiting->status==1): ?>
                        <td>accept </td>
                    <?php elseif($request_Waiting->status==2): ?>
                        <td>rejected </td>
                    <?php endif; ?>


                    <td style="width: 250px;"><a href="<?php echo e(route('request_for_help.details',[$request_Waiting->id])); ?>"  class="btn btn-success">show delails</a>
                    <a href="<?php echo e(route('request_for_help.delete_request',[$request_Waiting->id])); ?>"  class="btn btn-success">delete request</a></td>


                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>family count</th>
                <th>Office</th>
                <th>age</th>
                <th>mobile</th>
                <th>status</th>
                <th style="text-align: center">details</th>

            </tr>
            </tfoot>
        </table>

    </form>


<script>


    $(document).ready(function() {
        $('#example').DataTable();
    } );

    // Get value from data table
    $(document).on("click", "#btnMyTest001", function (e) {
        $('#my_modal #age').attr("value", $(this).attr("data-age"));
    })
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\charity\Charity_Project\resources\views/website/requests_for_help/request_rejected.blade.php ENDPATH**/ ?>