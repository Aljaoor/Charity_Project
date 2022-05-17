@extends('website.layouts.main')

@section('content')




    <table border="1">
        <tr>
            <th>volunteer id</th><th>event id</th><th>status</th> <th>process</th>
        </tr>
        @foreach($volunteerrequest as $volunteerrequest)
        <tr style="padding:20px; width:200px">
            <td style="padding:50px; width:200px">{{$volunteerrequest->volunteer_id}} </td>
            <td style="padding:50px; width:200px">{{$volunteerrequest->event_id}}</td>
            <td style="padding:50px; width:200px"> {{$volunteerrequest->status}}</td>
            <td >   <button>accept </button>
            <button>deny </button> </td>
        </tr>

        @endforeach



    </table>







@endsection
