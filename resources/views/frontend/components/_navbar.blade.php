<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="{{route('home')}}" class="navbar-brand sidebar-gone-hide">KeepKas</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item {{(Request::segment(1) == '' || Request::segment(1) == 'home' ? 'active' : '')}}"><a href="{{route('home')}}" class="nav-link">Home</a></li>
            <li class="nav-item {{(Request::segment(1) == 'kas-masuk' ? 'active' : '')}}"><a href="{{route('kas.masuk.user')}}" class="nav-link">Data Kas Masuk</a></li>
            <li class="nav-item {{(Request::segment(1) == 'kas-keluar' ? 'active' : '')}}"><a href="{{route('kas.keluar.user')}}" class="nav-link">Data Kas Keluar</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('template/assets/img/avatar/'.showImg(Auth::user()->id))}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{route('user.logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>