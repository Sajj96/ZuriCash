<!DOCTYPE html>
<html lang="en">

<head>
   <title>Nachangia Admin Dashboard</title>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="{{ asset('assets/images/logo-10.jpeg')}}" type="image/x-icon">
   <link rel="icon" href="{{ asset('assets/images/logo-10.jpeg')}}" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/themify-icons/themify-icons.css') }}">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/icofont/css/icofont.css') }}">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="{{ asset('admin/assets/plugins/chartist/dist/chartist.css') }}" type="text/css" media="all">

   <!-- Weather css -->
   <link href="{{ asset('admin/assets/css/svg-weather.css') }}" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/main.css') }}">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">

   @section('page-styles')
   @show

</head>

<body class="sidebar-mini fixed">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>

   @yield('content')

<!-- Required Jquery -->
<script src="{{ asset('admin/assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/tether/dist/js/tether.min.js') }}"></script>

<!-- Required Fremwork -->
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Scrollbar JS-->
<script src="{{ asset('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

<!--classic JS-->
<script src="{{ asset('admin/assets/plugins/classie/classie.js') }}"></script>

<!-- notification -->
<script src="{{ asset('admin/assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

<!-- Sparkline charts -->
<script src="{{ asset('admin/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

<!-- Counter js  -->
<script src="{{ asset('admin/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

<!-- Echart js -->
<script src="{{ asset('admin/assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<!-- custom js -->
<script type="text/javascript" src="{{ asset('admin/assets/js/main.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/pages/elements.js') }}"></script>
<script src="{{ asset('admin/assets/js/menu.min.js') }}"></script>
@section('page-scripts')
@show
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>