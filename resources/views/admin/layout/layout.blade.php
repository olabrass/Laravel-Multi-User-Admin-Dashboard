<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Admin Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url ('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('admin/css/adminlte.min.css') }}">

  <!-- Sweet alert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- /.navbar -->
  @include('admin.layout.header')


  <!-- Main Sidebar Container -->
   @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
 

  
  <!-- /.content-wrapper -->
  
  @yield('content')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin.layout.footer')
</div>



<!-- ./wrapper -->




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url ('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url ('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url ('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('js/adminlte.js') }}"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ url('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ url('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ url('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('admin/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ url ('admin/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url ('admin/js/pages/dashboard2.js') }}"></script>

<!-- Custom.js file link -->
<script src="{{ url('admin/js/custom.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<!-- Call the DataTable -->
<script>
  $(function () {
    $("#cmspages").DataTable()
    $("#viewSubadmins").DataTable()
    
  });
</script>

<!-- For Sweet alert -->

</body>
</html>
