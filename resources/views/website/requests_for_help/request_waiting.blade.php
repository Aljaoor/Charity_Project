@extends('website.layouts.main')
@section('content')




    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">





    <form id="form1" runat="server">


        <table id="example" class="display" style="width:100%;">
            <thead style="background-color: #3ac060;">
            <tr>
                <th>Name</th>
                <th>family count</th>
                <th>Office</th>
                <th>age</th>
                <th>mobile</th>
                <th>details</th>
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
                    <td><a href="{{route('request_for_help.details',[$request_Waiting->id])}}" id="btnMyTest001"  class="btn btn-success">show delails</a></td>

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
                <th>details</th>

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
