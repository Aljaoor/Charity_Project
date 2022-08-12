
<!DOCTYPE>
<html>

<head>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />
    <?php echo $__env->make('website.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>


<body>


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
    <!-- Start header -->
    <header id="header" class="tp-site-header header-style-2">
        <?php echo $__env->make('website.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <!-- end of header -->
            <form action="<?php echo e(route('eventsvolunteer.searchEvent')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <button type="submit" class="theme-btn" style="height: 30px;padding-top: 3px;">search</button>
                <div class="col-md-3" style="margin-left: 500px; margin-top: 0px; margin-bottom: 0px;">
                    <select id="Reason" class="form-control" name="search" required  autofocus style="height: 30px; margin-bottom: 20px;">
                        <option value="" selected disabled> <?php echo e($event_name??"Choose an event"); ?></option>
                        <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($event->title); ?>" ><?php echo e($event->title); ?> </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="hidden" value="3" name="status">
                </div>
            </form>
    <style>
        tfoot tr, thead tr {
            background: lightblue;
            background: #2db85d;
        }
        tfoot td {
            font-weight:bold;
        }

    </style>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th style="text-align: left;">*</th>
            <th style="text-align: left;">volunteer name</th>
            <th style="text-align: left;">volunteer age</th>
            <th style="text-align: left;">volunteer mobile</th>
            <th style="text-align: left;">volunteer email</th>
            <th style="text-align: left;">event name</th>
            <th style="text-align: left;">acount status</th>
            <th style="text-align: left;">status</th>
            <th style="text-align: left;">Modify</th>
        </tr>
        </thead>
        <tfoot>
        <tr style="width: 100%;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        </tfoot>
        <tbody>
                <?php $i=0; ?>


                <?php $__currentLoopData = $volunteerrequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volunteerrequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $i++; ?>
                    <tr>
                        <td style="background-color: whitesmoke"> <?php echo e($i); ?></td>

                        <td><?php echo e($volunteerrequest->user->name); ?> </td>
                            <td><?php echo e($volunteerrequest->user->age); ?> </td>
                            <td><?php echo e($volunteerrequest->user->mobile); ?> </td>
                            <td><?php echo e($volunteerrequest->user->email); ?> </td>
                            <td><?php echo e($volunteerrequest->event->title); ?></td>
                    <?php if($volunteerrequest->user->is_active==2): ?>
                                <td>not active </td>
                    <?php elseif($volunteerrequest->user->is_active==1): ?>
                                <td>active </td>

                    <?php endif; ?>



                     <?php if($volunteerrequest->status==3): ?>
                                <td> pending </td>
                     <?php elseif($volunteerrequest->status==1): ?>
                                <td>accept </td>
                     <?php elseif($volunteerrequest->status==2): ?>
                                <td>rejected </td>
                     <?php endif; ?>

                                <td class="btn-group" style="margin-top: 13px;" >
                                <a href="<?php echo e(route('eventsvolunteer.processing-accept',[$volunteerrequest->volunteer_id,$volunteerrequest->event_id])); ?>" > <button style="width:100px;   padding-left:15px ;height: 45px; background-color: 2db85d; color: black;">accept </button> </a>
                                    <button type="button"
                                            class="btn-block"
                                            data-toggle="modal"
                                            data-target="#deny"
                                            style="width:100px;padding-left:15px; height: 45px; margin-top: 5px; "
                                            data-vid="<?php echo e($volunteerrequest->volunteer_id); ?>"
                                            data-eid="<?php echo e($volunteerrequest->event_id); ?>"
                                    >
                                        deny
                                    </button>
                                </td>

                          </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>









    <form action="<?php echo e(route('eventsvolunteer.deny')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle" style="color: red">Reason of refuse</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="vid" id="vid" value="" type="hidden" >
                        <input name="eid" id="eid" value="" type="hidden">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="Reason" class="form-control" name="Reason" required autocomplete="Reason" autofocus placeholder=" Reason..." style="height: 50px; margin-bottom: 20px;">
                                    <option value="" selected disabled> Choose a reason</option>
                                    <option value="Not eligible for this event " >Not eligible for this event </option>
                                    <option value="Does't have a enough time " > Does't have a enough time </option>
                                    <option value="The age is not appropriate"> The age is not appropriate</option>


                                </select>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: whitesmoke;color: red;">deny</button>
                </div>
            </div>
        </div>
    </form>



</div>

<script>

    $(document).ready(function() {
        // DataTable initialisation
        $('#example').DataTable(
            {
                "paging": false,
                "autoWidth": true,
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api();
                    nb_cols = api.columns().nodes().length;
                    var j = 3;
                    while(j < nb_cols){
                        var pageTotal = api
                            .column( j, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return Number(a) + Number(b);
                            }, 0 );
                        // Update footer
                        $( api.column( j ).footer() ).html(pageTotal);
                        j++;
                    }
                }
            }
        );
    });
</script>







<!-- end of page-wrapper -->
<?php echo $__env->make('website.layouts.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>



<script>
    console.log('asdsa');
    $('#deny').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var vid = button.data('vid') // Extract info from data-* attributes
        var eid = button.data('eid') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body #vid').val(vid)

        modal.find('.modal-body #eid').val(eid)
    })


    document.addEventListener('DOMContentLoaded', function () {
        let table = new DataTable('#example');
    });

</script>

<?php /**PATH D:\charity\Charity_Project\resources\views/website/request/pending.blade.php ENDPATH**/ ?>