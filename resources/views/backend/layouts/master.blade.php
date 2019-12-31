<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ URL::asset('backend/img/favicon.png') }}">

  <title>@yield('title')</title>

  {{-- Datatable CSS --}}
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

  <!-- Bootstrap CSS -->
  <link href="{{ URL::asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- bootstrap theme -->
  <link href="{{ URL::asset('backend/css/bootstrap-theme.css') }}" rel="stylesheet">

  <!--external css-->
  <!-- font icon -->
  <link href="{{ URL::asset('backend/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('backend/css/font-awesome.css') }}" rel="stylesheet" />

  <!-- full calendar css-->
  <link href="{{ URL::asset('backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('backend/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />

  <!-- easy pie chart-->
  <link href="{{ URL::asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ URL::asset('backend/css/owl.carousel.css') }}" type="text/css">
  <link href="{{ URL::asset('backend/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">

  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ URL::asset('backend/css/fullcalendar.css') }}">
  <link href="{{ URL::asset('backend/css/widgets.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('backend/css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('backend/css/xcharts.min.css') }}" rel=" stylesheet">
  <link href="{{ URL::asset('backend/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">

</head>

@if (Auth::check())
  <?php  $background = '' ?>
@else
  <?php $background = 'login-img3-body' ?>
@endif

<body class="<?= $background ?>">
    <!-- container section start -->
    <section id="container" class="">
      <!-- if user already logined -->
      @auth
        <!-- show header -->
        @include('backend.layouts.header.header')

        <!-- show sidebar -->
        @include('backend.layouts.aside.aside')
      @endauth
      <!-- end if a user already logined -->

      <!-- show general content -->
      @yield('content')

    </section>
  </div>

<!-- javascripts -->
<script src="{{ URL::asset('backend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/js/jquery-ui-1.9.2.custom.min.js') }}"></script>

<!-- bootstrap -->
<script src="{{ URL::asset('backend/js/bootstrap.min.js') }}"></script>

<!-- nice scroll -->
<script src="{{ URL::asset('backend/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

<!-- charts scripts -->
<script src="{{ URL::asset('backend/assets/jquery-knob/js/jquery.knob.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ URL::asset('backend/js/owl.carousel.js') }}"></script>

{{-- jQuery datatable --}}
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>

{{-- bootbox Js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js.map"></script>

<!-- jQuery full calendar -->
<script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script>

<!-- Full Google Calendar - Calendar -->
<script src="{{ URL::asset('backend/assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>

<!--script for this page only-->
<script src="{{ URL::asset('backend/js/calendar-custom.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.rateit.min.js') }}"></script>

<!-- custom select -->
<script src="{{ URL::asset('backend/js/jquery.customSelect.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/chart-master/Chart.js') }}"></script>

<!--custome script for all page-->
<script src="{{ URL::asset('backend/js/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ URL::asset('backend/js/sparkline-chart.js') }}"></script>
<script src="{{ URL::asset('backend/js/easy-pie-chart.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('backend/js/xcharts.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.autosize.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.placeholder.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/gdp-data.js') }}"></script>
<script src="{{ URL::asset('backend/js/morris.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/sparklines.js') }}"></script>
<script src="{{ URL::asset('backend/js/charts.js') }}"></script>
<script src="{{ URL::asset('backend/js/jquery.slimscroll.min.js') }}"></script>

<!-- App scripts -->
@stack('scripts')

<script>
  //knob
  $(function() {
    $(".knob").knob({
      'draw': function() {
        $(this.i).val(this.cv + '%')
      }
    })
  });

  //carousel
  $(document).ready(function() {
    $("#owl-slider").owlCarousel({
      navigation: true,
      slideSpeed: 300,
      paginationSpeed: 400,
      singleItem: true

    });
  });

  //custom select box

  $(function() {
    $('select.styled').customSelect();
  });

  /* ---------- Map ---------- */
  $(function() {
    $('#map').vectorMap({
      map: 'world_mill_en',
      series: {
        regions: [{
          values: gdpData,
          scale: ['#000', '#000'],
          normalizeFunction: 'polynomial'
        }]
      },
      backgroundColor: '#eef3f7',
      onLabelShow: function(e, el, code) {
        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
      }
    });
  });
</script>

</body>

</html>
