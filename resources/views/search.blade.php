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
  <script type="text/javascript">
    // $(document).ready(function(){
    //   $('input:text').bind({
    //   });
    //   $("#term").autocomplete({
    //     minLength:3,
    //     autofocus: true,
    //     source: '{{URL('/search/autocomplete')}}'
    //   });
    // });
    $(document).ready(function(){
      $('#term').on("mouseover", function(event){
        // $("div").html("Event: " + event.type);
        $("#term").autocomplete({
          source: "{{ route('search.autocomplete') }}",
          minLength: 3,
          select: function(event, ui){
            console.log(ui);
            $("#term").val(ui.item.id);
          }
        });
      });
    });
  </script>
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
              <li><a href="/home">Asetqu</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
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
  <div class="search">
    <div class="text-center">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      {{ Form::open(['method'=>'GET', 'url'=>'search']) }}
      <div class="input-group">
        <input type="search" name="term" id="term" class="form-control input-lg" placeholder="Cari keyword yang Anda inginkan">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-lg btn-primary">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </span>
      </div>
      {{ Form::close()}}
    </div>
    <div class="content3">
      <p><strong>{{ $request->term }} {{ $barangs->total() }} Barang</strong></p>
        <ul>
        @foreach ($barangs as $barang)
          <li>
            <a href="/barang/{{$barang->id}}/view">
              <div class="col-sm-1">
                <strong>{{$barang->quantity}} <br> unit</strong>
              </div>
              <div class="col-sm-9">
                <strong>{{$barang->barang_name}}</strong>
                <p>
                  {{$barang->description}}&#124;
                  {{$barang->kondisi_name}}&#124;
                  {{$barang->status_name}}&#124;
                  {{$barang->ruangan_name}}&#124;
                  <span class="glyphicon glyphicon-user"></span>
                  {{$barang->pegawai_name}}
                </p>
              </div>
              <div class="col-sm-2 text-right">
                <span>{{$barang->created_at->format('Y-m-d')}}</span>
              </div>
            </a>
          </li>
        @endforeach
        </ul>
    </div>
    <div class="text-center">
      {{$barangs->appends(Request::except('page'))->links()}}
    </div>
  </div>
  <footer>
    <div class="container-fluid text-right">
      <p>powered by <a href="www.kawanlabs.com">Kawanlabs</a></p>
    </div>
  </footer>
</body>
</html>
