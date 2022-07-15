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
    <button class="theme-btn"  >deny this request </button>
    </div>

    <table id="customers">

        <tr style="height: 100px; max-height: 50px;">
            <td id="left">attachment proof</td>
            <td>                    @php $i=1; @endphp


            @foreach($request_proof as $request_proof)


{{--                {{$request_proof->image_name}}--}}
                <div style="height: 50px;">
                   <a> <button class="btn-group"> show attachment {{$i}} </button></a>
                    <a> <button class="btn-group" style="color: black"> download attachment {{$i}}</button></a>
                    <a> <button class="btn-group" style="color: red"> delete this attachment {{$i}}</button></a>

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





@endsection
