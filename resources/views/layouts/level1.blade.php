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
          <ul class="nav navbar-nav navbar-left">
            <li><a href="/home">Asetqu</a></li>
            <li><a href="http://www.kawanlabs.com/" target="_blank">#Kawanlabs</a></li>
            <li><a href="http://www.megaark.com/" target="_blank">#MegaArk</a></li>
            <li><a href="http://blog.kawanlabs.com/" target="_blank">#Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="jumbotron">
    <div class="text-center landing">
      @yield('content')
    </div>
  </div>
  <footer>
    <div class="container-fluid text-right">
      <p>powered by <a href="http://www.kawanlabs.com" target="_blank">Kawanlabs</a></p>
    </div>
  </footer>
</body>
</html>
