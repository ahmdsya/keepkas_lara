<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{$title}} | Keepkas</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('template/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('template/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('backend.components._navbar')
      
      @include('backend.components._sidebar')

      @yield('konten')

      <footer class="main-footer">
          {{footerLeft()}}
          
          {{footerRight()}}
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('template/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('template/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('template/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('template/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('template/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('template/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('template/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('template/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('template/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('template/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- <script src="{{asset('template/assets/modules/chart.min.js')}}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('template/assets/js/page/modules-datatables.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('template/assets/js/custom.js') }}"></script>
</body>
</html>