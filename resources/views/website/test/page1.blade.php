



<!DOCTYPE html>
<html lang="en">

<head>
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



    <html>
    <head>
        <link
            rel="stylesheet"
            type="text/css"
            href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
        />
    </head>

    <style>
        /*body {margin:2em;}*/
        tfoot tr, thead tr {
            background: lightblue;
        }
        tfoot td {
            font-weight:bold;
        }
    </style>

    {{--<a class="btn btn-success" style="float:left;margin-right:20px;" href="https://codepen.io/collection/XKgNLN/" target="_blank">Other examples on Codepen</a>--}}
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th style="text-align: center;">*</th>
            <th style="text-align: center;">volunteer name</th>
            <th style="text-align: center;">volunteer age</th>
            <th style="text-align: center;">volunteer mobile</th>
            <th style="text-align: center;">volunteer email</th>
            <th style="text-align: center;">event name</th>
            <th style="text-align: center;">acount status</th>
            <th style="text-align: center;">status</th>
            <th style="text-align: center;">Modify</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td>Totals</td>
            <td></td>
            <td></td>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td>1</td>
            <td>Alphabet puzzle</td>
            <td>2016/01/15</td>
            <td>212</td>
            <td data-order="1000.5">1000.50</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Game station</td>
            <td>2016/01/31</td>
            <td>75</td>
            <td data-order="1834">1834</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Chemistry set</td>
            <td>2016/01/23</td>
            <td>160</td>
            <td data-order="1500">1500</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Smartphone</td>
            <td>2016/02/26</td>
            <td>350</td>
            <td data-order="1200.38">1200.38</td>
        </tr>
        </tbody>
    </table>



    <script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
    ></script>
    <script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"
    ></script>



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




</div>
<!-- end of page-wrapper -->
@include('website.layouts.javascript')
</body>

</html>
