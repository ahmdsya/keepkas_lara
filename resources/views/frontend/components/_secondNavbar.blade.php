      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">

            <li class="nav-item {{(Request::segment(1) == 'bayar-kas' ? 'active' : '')}}">
              <a href="{{route('bayar.kas')}}" class="nav-link"><span>Bayar Kas</span></a>
            </li>

            <li class="nav-item {{(Request::segment(1) == 'rincian-kas' ? 'active' : '')}}">
              <a href="{{route('rincian.kas.user')}}" class="nav-link"><span>Rincian Kas Saya</span></a>
            </li>

            <li class="nav-item {{(Request::segment(1) == 'data-siswa' ? 'active' : '')}}">
              <a href="{{route('data.user')}}" class="nav-link"><span>Data Siswa</span></a>
            </li>

            <li class="nav-item {{(Request::segment(1) == 'profile' ? 'active' : '')}}">
              <a href="{{route('profile.user', Auth::user()->id)}}" class="nav-link"><span>Profile</span></a>
            </li>
          </ul>
        </div>
      </nav>