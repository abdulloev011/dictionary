<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('css/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('css/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('css/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('css/summernote/summernote-bs4.min.css')}}">
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <div class="spinner-border text-info" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-dark" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user-circle"></i>
        </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            
            <a href="#" class="dropdown-item">
                <img src="{{asset('img/user/user_1.png')}}" style="width: 50px;height:50px;margin-left:41%" class="img-circle elevation-2" alt="User Image">
                <h5 class="text-center">{{Auth::user()->name}}</h5>
                
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{route('profile.show') }}" class="dropdown-item">
              <i class="fas fa-users mr-2"></i>Аккаунт
              
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{route('profile.show') }}" class="dropdown-item">
              <i class="fas fa-cog mr-2"></i>Настройка
            </a>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf

                    <a style="color: #111" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                        <h6><i class="fa fa-power-off mr-2"></i>Выход</h6>
                    </a>
                </form>
            </a>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/img/dict.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route("dashboard")}}" class="nav-link @yield("dashboard")">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route("all-words")}}" class="nav-link @yield("orders")">
              <i class="nav-icon fas fa-language"></i>
              <p>
                Cловарь
              </p>
            </a>
          </li>
          @if(Auth::user()->id_role == 1)
            <li class="nav-item">
              <a href="{{route('users')}}" class="nav-link @yield("user")">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Пользователи
                </p>
              </a>
            </li>
          @endif
          <li class="nav-item">
            <a href="{{route('my-words',Auth::user()->id)}}" class="nav-link  @yield("my-words")">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Мои слова
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" >
        <div class="container-fluid">
            @yield('content')
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('css/jquery/jquery.min.js')}}"></script>

<script>

  $( document ).ready(function() {
  	$(".user-edit").click(function() {
		  $("#user_id").val($(this).attr("data-id")); 
 	});
   });

   $( document ).ready(function() {
  	$(".user-del").click(function() {
		  $("#user_del").val($(this).attr("data-id")); 
 	});
   });
</script>


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('css/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>+
<!-- ChartJS -->
<script src="{{asset('css/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('css/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('css/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('css/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('css/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('css/moment/moment.min.js')}}"></script>
<script src="{{asset('css/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('css/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('css/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('css/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('css/dist/js/pages/dashboard.js')}}"></script>
<script src="https://use.fontawesome.com/e7bec047f8.js"></script>
<script src="{{asset('css/dist/js/demo.js')}}"></script>

<script src="{{asset('/css/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/css/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/css/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/css/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/css/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/css/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/css/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/css/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/css/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>

<script>
	// Пример стартового JavaScript для отключения отправки форм при наличии недопустимых полей
(function () {
  'use strict'

  // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
  var forms = document.querySelectorAll('.needs-validation')

  // Зацикливайтесь на них и предотвращайте отправку
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>
