<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/master.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
          <a class="navbar-brand" href="/"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Kembali ke beranda</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="break"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 menu text-center">
        @yield('content')
        <div class="trandmark">
          <p >2017- All Rights Reserved.<br>
          PHP, HTML, CSS, LARAVEL, MYSQL</p>
        </div>
      </div>
      <div class="col-sm-9 content">
          <h2>Kelola aset anda dengan baik dan tepat</h2>
          <p>Secure | Safe | Trackable | Trusted</p>
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
