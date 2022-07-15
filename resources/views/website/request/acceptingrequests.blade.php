
<!DOCTYPE>
<html>

<head>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />
    @include('website.layouts.head')



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
        @include('website.layouts.header')
    </header>
    <!-- end of header -->

    <form action="{{route('eventsvolunteer.searchEvent')}}" method="post">
                @csrf
                <button type="submit" class="theme-btn" style="height: 30px;padding-top: 3px;">search</button>
        <button type="button"
                class="theme-btn"
                id="acceptChecked"
                data-toggle="modal"
                data-target="#acceptCheck"
                style="height: 30px;padding-top: 3px;"
                data-vid="11"

        >
            accept checked
        </button>
        <button type="button"
                class="theme-btn"
                id="denyChecked"
                data-toggle="modal"
                data-target="#denyCheck"
                style=" height: 30px; padding-top: 3px;"

        >
            deny checked
        </button>

        <div class="col-md-3" style="margin-left: 200px; margin-top: 0px; margin-bottom: 0px;">
                    <select id="Reason" class="form-control" name="search" required  autofocus style="height: 30px; margin-bottom: 20px;">
                        <option value="" selected disabled> {{ $event_name??"Choose an event" }}</option>
                        @foreach($event as $event)
                          <option value="{{$event->title}}" >{{$event->title}} </option>

                        @endforeach
                    </select>
                    <input type="hidden" value="0" name="status">
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
            <th style="text-align: left;">select</th>

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
            <td></td>

        </tr>
        </tfoot>
        <tbody>

                @php $i=0; @endphp


                @foreach($volunteerrequest as $volunteerrequest)
                        @php $i++; @endphp
                    <tr id="eid{{$volunteerrequest->event_id}}">
                        <td style="background-color: whitesmoke"> {{$i}}</td>



                        <td>{{$volunteerrequest->user->name}} </td>
                            <td>{{$volunteerrequest->user->age}} </td>
                            <td>{{$volunteerrequest->user->mobile}} </td>
                            <td>{{$volunteerrequest->user->email}} </td>
                            <td>{{$volunteerrequest->event->title}}</td>
                    @if($volunteerrequest->user->is_active==2)
                                <td>not active </td>
                    @elseif ($volunteerrequest->user->is_active==1)
                                <td>active </td>

                    @endif



                     @if($volunteerrequest->status==3)
                                <td> pending </td>
                     @elseif ($volunteerrequest->status==1)
                                <td>accept </td>
                     @elseif ($volunteerrequest->status==2)
                                <td>rejected </td>
                     @endif

                                <td class="btn-group" style="margin-top: 13px;" >
                                <a href="{{route('eventsvolunteer.processing-accept',[$volunteerrequest->volunteer_id,$volunteerrequest->event_id])}}" > <button style="width:100px;   padding-left:15px ;height: 45px; background-color: 2db85d; color: black;">accept </button> </a>
                                    <button type="button"
                                            class="btn-block"
                                            data-toggle="modal"
                                            data-target="#deny"
                                            style="width:100px;padding-left:15px; height: 45px; margin-top: 5px; "
                                            data-vid="{{$volunteerrequest->volunteer_id}}"
                                            data-eid="{{$volunteerrequest->event_id}}"
                                    >
                                        deny
                                    </button>
                                </td>


                        <td>
                            <input type="checkbox" name="ids"  class="checkBoxClass" value="{{$volunteerrequest->event_id}}" data-volunteer="{{$volunteerrequest->volunteer_id}}" style="margin-left: 20px; margin-top: 35px;">
                        </td>




                          </tr>
                @endforeach


        </tbody>
    </table>






    {{--  -------------------------  modal for deny once-----------------------------}}



    <form action="{{route('eventsvolunteer.deny')}}" method="post">
        @csrf
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
                    <button type="submit" class="btn btn-primary" style="background: lightblue;color: black">deny</button>
                </div>
            </div>
        </div>
    </form>


    {{--  -------------------------  modal for accept checked-----------------------------}}

    <form action="{{route('eventsvolunteer.acceptcheck')}}" method="post">
        @csrf
        <div class="modal fade" id="acceptCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle" style="color: lightblue">Accept all of checkedbox</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="volunteer_ids" id="volunteer_ids" value="" type="hidden" >
                        <input name="event_ids" id="event_ids" value="" type="hidden">


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: lightblue;color: black">yes</button>
                </div>
            </div>
        </div>
    </form>


    {{--  -------------------------  modal for deny checked-----------------------------}}

    <form action="{{route('eventsvolunteer.denycheck')}}" method="post">
        @csrf
        <div class="modal fade" id="denyCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle" style="color: red;">Deny all of checkedbox</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="volunteer_ids" id="volunteer_ids" value="" type="hidden" >
                        <input name="event_ids" id="event_ids" value="" type="hidden">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Reason for rejection</label>

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
                    <button type="submit" class="btn btn-primary" style="background: red;color: whitesmoke  ">yes</button>
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
@include('website.layouts.javascript')
</body>
</html>




<script>

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


{{-----------------------------script for accept checked--------------------------}}


<script>




$('#acceptCheck').on('show.bs.modal', function (event) {



    var  event_id = [];

    var  volunteer_id = [];

    $("input:checkbox[name=ids]:checked").each(function (){

        event_id.push($(this).val());
        volunteer_id.push($(this).data('volunteer'));

    })

    console.log(event_id);


    console.log(volunteer_id);

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #volunteer_ids').val(volunteer_id)

    modal.find('.modal-body #event_ids').val(event_id)
})




</script>


{{-----------------------------script for deny checked--------------------------}}


<script>




    $('#denyCheck').on('show.bs.modal', function (event) {



        var  event_id = [];

        var  volunteer_id = [];

        $("input:checkbox[name=ids]:checked").each(function (){

            event_id.push($(this).val());
            volunteer_id.push($(this).data('volunteer'));

        })

        console.log(event_id);


        console.log(volunteer_id);

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body #volunteer_ids').val(volunteer_id)

        modal.find('.modal-body #event_ids').val(event_id)
    })




</script>




