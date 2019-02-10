<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin</title>
	  <link rel="apple-touch-icon" href="{{asset('te/app-assets/images/ico/apple-icon-120.png')}}">
    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/asset/minilogo.png')}}">
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
	  rel="stylesheet">
	  <!-- BEGIN VENDOR CSS-->
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/css/vendors.min.css')}}">
	  <!-- END VENDOR CSS-->
	  <!-- BEGIN MODERN CSS-->
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/css/app.min.css')}}">
	  <!-- END MODERN CSS-->
	  <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/css/core/colors/palette-gradient.min.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/vendors/css/charts/morris.cs')}}s">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/fonts/simple-line-icons/style.min.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('template/app-assets/css/core/colors/palette-gradient.min.css')}}">
	  <!-- END Page Level CSS-->
	  <!-- BEGIN Custom CSS-->
	  <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables-1.10.18/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mystyle.css')}}">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  <div class="base-url" style="display: none">{{url('/')}}</div>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="#">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('template/app-assets/images/logo/logo.png')}}">
              <h3 class="brand-text">Admin</h3>
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <h3 class="brand-text" style="padding-top:20px;">&nbsp&nbsp&nbsp; {{Auth::user()->name}}</h3>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('/admin')}}"><i class="fa fa-home"></i><span class="menu-title" data-i18n="">Home</span></a>
        </li>
      </ul>
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          <span data-i18n="nav.category.support">Data</span>
        </li>
        <li class=" nav-item"><a href="#"><i class="fa fa-book"></i><span class="menu-title" data-i18n="nav.dash.main">Manipulasi Data</a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{url('/admin/datapengguna')}}" data-i18n="nav.dash.ecommerce"> Pengguna</a>
            </li>
            <li><a class="menu-item" href="{{url('/admin/datapetugas')}}" data-i18n="nav.dash.crypto"> Petugas</a>
            </li>
            <li><a class="menu-item" href="{{url('/admin/dataadmin')}}" data-i18n="nav.dash.sales"> Admin</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="{{url('/admin/datatransportasi')}}"><i class="fa fa-id-card"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Transportasi</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('/admin/datarute')}}"><i class="fa fa-map-signs"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Rute</span></a>
        </li>
        <li class=" nav-item">
          <a href="{{url('/tentangkami')}}"><i class="fa fa-info-circle"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Tentang Pembuat</span>
          </a>
        </li>
        <li class=" navigation-header">
          <span data-i18n="nav.category.support">Menu</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Support"></i>
        </li>
        <li class=" nav-item">
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              <i class="ft-power"></i><span class="menu-title" data-i18n="nav.support_documentation.main"> Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </div>
  </div>

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			@yield('content')
		</div>
	</div>
</div>

<script src="{{asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('template/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"
  type="text/javascript"></script>
  <script src="{{asset('template/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"
  type="text/javascript"></script>
  <script src="{{asset('template/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('template/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('template/app-assets/js/scripts/pages/dashboard-sales.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
  <script type="text/javascript" src="{{asset('DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/myjs.js')}}"></script>

  @yield('js')
</body>
</html>