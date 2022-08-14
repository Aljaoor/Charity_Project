@extends('website.layouts.main')
@section('content')

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }
        #left {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            background-color: #5cb85c;
            width: 30%;
            text-align: center;


        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;

        }
    </style>



    <h1 style="text-align: center;">status of request
        @if($details->status==3)
          <span style="color: gray">pending</span>
        @elseif ($details->status==1)
            <span style="color: #3ac060">accept</span>
        @elseif ($details->status==2)
            <span style="color: #c9302c"> rejected</span>
        @endif


    </h1>


    <div>
    <span style="padding-left: 100px; font: bold; font-size: 25px;">Details request of {{$details->user->name}}</span>

    <button class="theme-btn"  style="margin-left: 550px;"
            data-toggle="modal"
            data-target="#accept"
            data-accept_request_id="{{$details->id}}"
            id="btnaccept" >
            accept this request </button>
    <button class="theme-btn"
            data-toggle="modal"
            data-target="#deny"
            data-request_id="{{$details->id}}"
            id="btndeny" >deny this request </button>
    </div>

    <table id="customers">

        <tr style="height: 100px; max-height: 50px;">
            <td id="left">attachment proof</td>
            <td>                    @php $i=1; @endphp


            @foreach($request_proof as $request_proof)


{{--                {{$request_proof->image_name}}--}}
                <div style="height: 50px;">
                   <a href="{{route('request_proof.show',[$request_proof->image_name,$request_proof->request_id])}}"> <button class="btn-group"> show attachment {{$i}} </button></a>
                    <a href="{{route('request_proof.download',[$request_proof->image_name,$request_proof->request_id])}}"> <button class="btn-group" style="color: black"> download attachment {{$i}}</button></a>
                    <a href="{{route('request_proof.delete',[$request_proof->image_name,$request_proof->request_id])}}"> <button class="btn-group" style="color: red"> delete this attachment {{$i}}</button></a>

                    <hr>
                </div>
                    @php $i++; @endphp





            @endforeach
            </td>

        </tr>
        @if($details->status==2)


        <tr>
            <td id="left">cancellation reason</td>
            <td>{{$details->cancellation_reason}} </td>

        </tr>
        @elseif($details->status==1)
            <tr>
                <td id="left">type of help</td>
                <td>{{ \App\Models\Beneficiary::where('member_id', $details->member_id)->whereOfficeId($details->office_id)->first()->help}}</td>

            </tr>


        @endif

        <tr>
            <td id="left">request verified at</td>
            <td>{{$details->request_verified_at}} </td>

        </tr>

        <tr>
            <td id="left">number of family count</td>
            <td>{{$details->family_count}} </td>

        </tr>
        <tr>
            <td id="left">office name</td>
            <td>{{$details->office->name}} </td>

        </tr>
        <tr>
            <td id="left">reason of request</td>
            <td>{{$details->reason_of_request}} </td>

        </tr>
        <tr>
            <td id="left">age</td>
            <td>{{$details->user->age}} </td>

        </tr>
        <tr>
            <td id="left"> email</td>
            <td>{{$details->user->email}} </td>

        </tr>
        <tr>
            <td id="left">mobile or number</td>
            <td>{{$details->user->mobile}} </td>

        </tr>



    </table>


{{--==========================deny modal ======================================--}}
    <form action="{{route('request_for_help.deny')}}" method="post">

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
                        <input name="request_id" id="request_id" value="" type="hidden" >
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="Reason" class="form-control" name="Reason" required autocomplete="Reason" autofocus placeholder=" Reason..." style="height: 50px; margin-bottom: 20px;">
                                    <option value="" selected disabled> Choose a reason</option>
                                    <option value="The proof files are not enough " >The proof files are not enough. </option>
                                    <option value="He doesn't need help " > He doesn't need help </option>
                                    <option value="This office is not specialized in these cases"> This office is not specialized in these cases.</option>


                                </select>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: whitesmoke;color: red">deny</button>
                </div>
            </div>
        </div>
    </form>

    <script>




        // Get value from data table
        $(document).on("click", "#btndeny", function (e) {

            $('#deny #request_id').attr("value", $(this).attr("data-request_id"));
        })
    </script>

{{--==========================accept modal ======================================--}}

    <form action="{{route('Beneficiary.accept')}}" method="post">

        @csrf
        <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="title" style="color: #3ac060">Type of help provided</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div>
                            <div>
                                <label for="money" style="margin-left: 150px; font-size: 25px;"> money</label>
                                <input type="radio" id="money" value="money" name="type" >
                                <label for="bail" style="padding-left: 50px; font-size: 25px;" > bail</label>
                                <input type="radio" id="bail" value="bail" name="type" >
                            </div>


                        </div>

                        <input name="request_id" id="accept_request_id" value="" type="hidden" >


                                 <div class="select money">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select class="form-control" name="sum"  autocomplete="Reason" autofocus placeholder=" Reason..." style="   height: 50px; margin-bottom: 20px; border: 2px solid whitesmoke;">
                                    <option value="" selected disabled>Choose a sum of money</option>
                                    <option value=" 50,000 S.P " >50,000 S.P </option>
                                    <option value=" 100,000 S.P" > 100,000 S.P </option>
                                    <option value=" 200,000 S.P "> 200,000 S.P</option>
                                    <option value="300,000 S.P "> 300,000 S.P</option>



                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="select bail">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select class="form-control" name="sum"  style="height: 50px; margin-bottom: 20px;  border: 2px solid #2db85d; border-radius: 5px; ">
                                        <option  value="" selected disabled > Choose the type of bail</option>
                                        <option value="Orphan bail  " >Orphan bail  </option>
                                        <option value="Ensuring a study " > Ensuring a study </option>
                                        <option value="Housing bail"> Housing bail</option>


                                    </select>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: whitesmoke;color: #3ac060">accept</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(".money ").hide();
        $(".bail ").hide();




        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".select").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>

    <script>




        // Get value from data table
        $(document).on("click", "#btnaccept", function (e) {
            $('#accept #accept_request_id').attr("value", $(this).attr("data-accept_request_id"));
        })
    </script>







@endsection
