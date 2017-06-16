<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/datepicker.css">
  <link rel="stylesheet" href="/css/master.css">
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
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
  <link rel="stylesheet" href="/js/chart/chartist.min.css">
<link rel="stylesheet" href="/js/chart/morris.css">
<link rel="stylesheet" href="/js/chart/plottable.css">
<link rel="stylesheet" href="/js/chart/c3.min.css"><style>
@-webkit-keyframes rotate-forever {
  0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
  }
  100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
  }
}
@-moz-keyframes rotate-forever {
  0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
  }
  100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
  }
}
@keyframes  rotate-forever {
  0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
  }
  100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
  }
}
.loading-spinner {
  -webkit-animation-duration: 0.75s;
  -moz-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-name: rotate-forever;
  -moz-animation-name: rotate-forever;
  animation-name: rotate-forever;
  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  animation-timing-function: linear;
  height: 60px;
  width: 60px;
  border-radius: 50%;
  display: inline-block;
}

</style>
<script type="text/javascript" src="/js/chart/jquery.min.js"></script>
<script type="text/javascript" src="/js/chart/gauge.min.js"></script>
<script type="text/javascript" src="/js/chart/chartist.min.js"></script>
<script type="text/javascript" src="/js/chart/Chart.min.js"></script>
<script type="text/javascript" src="/js/chart/fusioncharts.js"></script>
<script type="text/javascript" src="/js/chart/fusioncharts.theme.fint.js"></script>
<script type="text/javascript" src="/js/chart/jsapi.com"></script>
<script type="text/javascript" src="/js/chart/loader.js"></script>
<script type="text/javascript">google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})</script>
<script type="text/javascript" src="/js/chart/highcharts.js"></script>
<script type="text/javascript" src="/js/chart/offline-exporting.js"></script>
<script type="text/javascript" src="/js/chart/map.js"></script>
<script type="text/javascript" src="/js/chart/data.js"></script>
<script type="text/javascript" src="/js/chart/world.js"></script>
<script type="text/javascript" src="/js/chart/raphael.min.js"></script>
<script type="text/javascript" src="/js/chart/justgage.min.js"></script>
<script type="text/javascript" src="/js/chart/raphael.min.js"></script>
<script type="text/javascript" src="/js/chart/morris.min.js"></script>
<script type="text/javascript" src="/js/chart/d3.min.js"></script>
<script type="text/javascript" src="/js/chart/plottable.min.js"></script>
<script type="text/javascript" src="/js/chart/progressbar.min.js"></script>
<script type="text/javascript" src="/js/chart/d3.min.js"></script>
<script type="text/javascript" src="/js/chart/c3.min.js"></script><script>
  $(function() {
      $('.charts').each(function() {
          var chart = $(this).find('.charts-chart');
          var loader = $(this).find('.charts-loader');
          var time = loader.data('duration');

          if(loader.hasClass('enabled')) {
              chart.css({visibility: 'hidden'});
              loader.fadeIn(350);

              setTimeout(function() {
                  loader.fadeOut(350, function() {
                      chart.css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 350);
                  });
              }, time)
          }
      });
  })
</script>
  <!-- {!! Charts::assets() !!} -->
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
          <a href="/barang">Daftar Barang</a>
          <a href="/inventori">Daftar Inventori</a>
          <a href="/barang/mutation">Mutasi Inventori</a>
          <a href="/laporan">Laporan/Report</a>
          <label>Managemen</label>
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
      <div class="col-sm-10 content">
        <div class="col-sm-8">
          <div class="charts">
            <center>
                {!! $charts->render() !!}
            </center>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="barang charts">
            <a href="/barang"><strong>{{ $barangs }}</strong></a>
            <p>Jumlah Barang</p>
          </div>
          <div class="charts">
            <center>
                {!! $charts2->render() !!}
            </center>
          </div>
          <div class="charts">
            <center>
                {!! $years->render() !!}
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container-fluid text-right">
      <p>powered by <a href="www.kawanlabs.com">Kawanlabs</a></p>
    </div>
  </footer>
</body>
</html>
