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



    <h1 style="text-align: center;">Details request of {{$details->user->name}} </h1>
    <div>

    <button class="theme-btn"  style="margin-left: 1000px;">accept this request </button>
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
        <tr>
            <td id="left">number of family count</td>
            <td>{{$details->family_count}} </td>

        </tr>
        <tr>
            <td id="left">office name</td>
            <td>{{$details->office->name}} </td>

        </tr>
        <tr style="height: 150px;">
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
                                    <option value="Not eligible for this event " >The proof files are not enough. </option>
                                    <option value="Does't have a enough time " > He doesn't need help </option>
                                    <option value="The age is not appropriate"> This office is not specialized in these cases.</option>


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
            console.log("moj");
            $('#deny #request_id').attr("value", $(this).attr("data-request_id"));
        })
    </script>

{{--==========================accept modal ======================================--}}








@endsection
