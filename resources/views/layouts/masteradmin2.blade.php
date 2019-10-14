<!DOCTYPE html>
<html>
  <head>
    @php
        use RealRashid\SweetAlert\Facades\Alert;
    @endphp
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{asset('img/icons/favicon.ico')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminPAGE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->{{asset('')}}
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>PAGE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        {{-- <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
                {{-- <span class="hidden-xs">{{$Nama}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    {{$Nama}} - Admin TU 
                    <small>Member</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <button id="form-submit" onclick="logout()" class="login100-form-btn">Sign out</button>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div> --}}
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            {{-- <p>{{$Nama}}</p> --}}
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="{{URL('/admin')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Activity</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL('/admin/siswa')}}"><i class="fa fa-circle-o"></i>Data Siswa</a></li>
              <li><a href="{{URL('/admin/addsiswa')}}"><i class="fa fa-circle-o"></i>Tambah Data Siswa</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Transaction</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              {{-- <li><a href="{{URL('/admin/coba')}}"><i class="fa fa-circle-o"></i>Pembayaran</a></li> --}}
              <li><a href="{{URL('/admin/pembayaran')}}"><i class="fa fa-circle-o"></i>Pembayaran SPP Siswa</a></li>
            </ul>
          </li>
            
          <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      </ul>
      <!-- Tab panes -->
      
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script>
    $(document).ready( function () {
        $('#example1').DataTable();
    } );
    </script>
    <!------------------------------------------------------------------------------->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
          apiKey: "AIzaSyDWenV1kmkCEK8g0lwxEg1EV95Q5dVXRlk",
          authDomain: "bayars-53bb2.firebaseapp.com",
          databaseURL: "https://bayars-53bb2.firebaseio.com",
          projectId: "bayars-53bb2",
          storageBucket: "bayars-53bb2.appspot.com",
          messagingSenderId: "366526935281",
          appId: "1:366526935281:web:df465b12fd88fcf2c8b950"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);

      function logout(){
        firebase.auth().signOut();
        window.location.href = "{{URL('logout')}}"
      // alert()->success('You have been logged out.', 'Good bye!');
    }
    </script>
    <script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClic/adminlte -->
    <script src="{{asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE/adminlte-->
    <script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE/adminltedurposes -->
    <script src="{{asset('adminlte/js/demo.js')}}"></script>
    @include('sweetalert::alert')
    @yield('scripts')
    @yield('foot')
  </body>
</html>
