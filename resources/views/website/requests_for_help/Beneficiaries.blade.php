@extends('website.layouts.main')
@section('content')




    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    <form action="{{route('request_for_help.search_office')}}" method="post">
        @csrf
        <button type="submit" class="theme-btn" style="height: 30px;padding-top: 3px;">search</button>
        <div class="col-md-3" style="margin-left: 500px; margin-top: 0px; margin-bottom: 0px;">
            <select  class="form-control" name="search" required  autofocus style="height: 30px; margin-bottom: 20px;">
                <option value="" selected disabled> {{ $office_name??"Choose an event" }}</option>
                <option value="all"> All offices</option>

            @foreach($office as $office)
                    <option value="{{$office->name}}" >{{$office->name}} </option>

                @endforeach
            </select>
            <input type="hidden" value="1" name="status">
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
            @foreach($request_Waiting as $request_Waiting)

                <tr>

                    <td>{{$request_Waiting->user->name}}</td>
                    <td>{{$request_Waiting->family_count}}</td>
                    <td>{{$request_Waiting->office->name}}</td>
                    <td>{{$request_Waiting->user->age}}</td>
                    <td>{{$request_Waiting->user->mobile}}</td>

                    @if($request_Waiting->status==3)
                        <td> pending </td>
                    @elseif ($request_Waiting->status==1)
                        <td>accept </td>
                    @elseif ($request_Waiting->status==2)
                        <td>rejected </td>
                    @endif


                    <td style="width: 250px;"><a href="{{route('request_for_help.details',[$request_Waiting->id])}}"  class="btn btn-success">show delails</a>
                    <a href="{{route('request_for_help.delete_request',[$request_Waiting->id])}}"  class="btn btn-success">delete request</a></td>


                </tr>

            @endforeach



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



@endsection
