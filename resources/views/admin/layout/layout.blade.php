<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Greek Capotal</title>
    
    <base href="{{ asset('') }}"></base>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"/>

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.css') }}" >

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/dist/css/sb-admin-2.css') }}" >

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css') }}" >

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" >

    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" >
</head>

<body>

    <div id="wrapper">

       @include('admin.patials.header')
       @yield('content')

   </div>
   <!-- /#wrapper -->

   <!-- jQuery -->
    <script src="{{ URL::asset('admin_asset/bower_components/jquery/dist/jquery.min.js') }}"></script>

   <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

   <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ URL::asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

   <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('admin_asset/dist/js/sb-admin-2.js') }}"></script>

@yield('script')
</body>
</html>
