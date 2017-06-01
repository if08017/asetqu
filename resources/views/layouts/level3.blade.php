<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/datepicker.css">
  <link rel="stylesheet" href="/js/jqueryui/jquery-ui.min.css">
  <link rel="stylesheet" href="/js/jqueryui/jquery-ui.theme.css">
  <link rel="stylesheet" href="/css/master.css">
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="/js/jqueryui/jquery-ui.min.js"></script>
  <!-- Scripts -->
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
  <script type="text/javascript">
    $(function(){
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
      });
    });
  </script>
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="Logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
            @else
              <li><a href="/search">Search</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="/kelola">Kelola aplikasi</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="break"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 menu">
        <div class="">
          <a href="/home" class="active">Dashboard</a>
          <a href="/barang/inventori">Input Inventori</a>
          <a href="/barang/mutation">Mutasi Barang</a>
          <a href="/laporan">Laporan/Report</a>
          <label>Managemen</label>
          <a href="/barang">Daftar Barang</a>
          <a href="/pegawai">Daftar Pegawai</a>
          <a href="/bidang">Bidang Kerja</a>
          <a href="/management">Jabatan & Ruangan</a>
          <a href="/barang/golongan">Golongan Barang</a>
          <a href="/barang/kelompok">Kelompok Barang</a>
        </div>
        <div class="trandmark">
          <p >2017- All Rights Reserved.<br> PHP, HTML, CSS, LARAVEL, MYSQL</p>
        </div>
      </div>
    @yield('content')
  </div>
  <footer>
    <div class="container-fluid text-right">
      <p>powered by <a href="www.kawanlabs.com">Kawanlabs</a></p>
    </div>
  </footer>
</body>
</html>
