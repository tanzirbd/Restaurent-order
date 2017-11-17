<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/admin')}}/dist/css/skins/_all-skins.min.css">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/morris.js/morris.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/admin')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/admin')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('admin.includes.header')
@include('admin.includes.sidebar')

@yield('body_content')

<!-- jQuery 3 -->
<script src="{{asset('/admin')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/admin')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('/admin')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin')}}/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/admin')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{asset('/admin')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/admin')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="{{asset('/admin')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/admin')}}/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/admin')}}/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/admin') }}/dist/js/demo.js"></script>


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/admin') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Morris.js charts -->
<script src="{{ asset('/admin') }}/bower_components/raphael/raphael.min.js"></script>
<script src="{{ asset('/admin') }}/bower_components/morris.js/morris.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/admin') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/admin') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ asset('/admin') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('/admin') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/admin') }}/dist/js/pages/dashboard.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
</body>
</html>
