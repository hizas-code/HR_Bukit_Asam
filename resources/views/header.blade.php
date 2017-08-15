<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="{{url('jquery-chained/jquery.chained.js')}}"></script>

</head>
<body
    @yield('content')
</body>

<script>
    $(document).ready(function() {
        $('#account_table').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    } );
    $("#satuan").chained("#barang"); 
</script>
    
</html>
