@extends('website.layouts.main')

@section('content')


    <style>


        tr:nth-child(even) {
            background-color: #bce8f1;

        }

        tr:nth-child(odd) {
            background-color: #d0e9c6;
        }
        </style>


    <table style="text-align: center;width:100%; padding:0px; ">
        <tr  style="background: #3ac060 ;padding-left:0px;  border: 1px;" >
            <th style="text-align: center;">volunteer name</th>
            <th style="text-align: center;">volunteer age</th>

            <th style="text-align: center;">volunteer mobile</th>
            <th style="text-align: center;">volunteer email</th>
            <th style="text-align: center;">event name</th>
            <th style="text-align: center;">acount status</th>




          <th style="text-align: center;">status</th> <th style="text-align: center;">process</th>
        </tr>
        @foreach($volunteerrequest as $volunteerrequest)
                <tr style="padding:20px; width:200px;">
            <td style="padding:10px; width:200px">{{$volunteerrequest->user->name}} </td>
                    <td style="padding:50px; width:200px">{{$volunteerrequest->user->age}} </td>

                    <td style="padding:20px; width:150px">{{$volunteerrequest->user->mobile}} </td>
                    <td style="padding:20px; width:200px">{{$volunteerrequest->user->email}} </td>
                    <td style="padding:20px; width:200px">{{$volunteerrequest->event->title}}</td>

                @if($volunteerrequest->user->is_active==2)
                        <td style="padding:20px; width:100px">not active </td>
                    @elseif ($volunteerrequest->user->is_active==1)
                        <td style="padding:20px; width:100px">active </td>

                    @endif



                 @if($volunteerrequest->status==3)
                        <td style="padding:10px; width:150px">pending </td>
                    @elseif ($volunteerrequest->status==1)
                        <td style="padding:10px; width:100px">accept </td>
                    @elseif ($volunteerrequest->status==2)
                        <td style="padding:10px; width:100px">rejected </td>
                   @endif

                    <td >
                        <a href="{{route('eventsvolunteer.processing-accept',[$volunteerrequest->volunteer_id,$volunteerrequest->event_id])}}"> <button  class="theme-btn" style="width:10px;  padding-left:15px ;height: 45px;">accept </button> </a>
                      <button class="theme-btn" style="width:10px;padding-left:15px; height: 45px; margin-top: 5px;">deny </button>
                    </td>

        </tr>


        @endforeach



    </table>







@endsection
