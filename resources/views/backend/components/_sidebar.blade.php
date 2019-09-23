  <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">KeepKas</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KK</a>
          </div>
          <ul class="sidebar-menu">

            <li class="{{(Request::segment(1) == 'admin' && Request::segment(2) == '' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('admin.home')}}"><i class="far fa-grin-hearts"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{(Request::segment(2) == 'kas-masuk' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('kas-masuk.index')}} "><i class="far fa-grin-tongue-squint"></i> <span>Kas Masuk</span>
                @if(Auth::user()->level == 'Bendahara')
                  @if(notif(Auth::user()->kelas) >= 1)
                  <div class="badge badge-primary badge-sm">{{notif(Auth::user()->kelas)}}</div>
                  @endif
                @endif
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'kas-keluar' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('kas-keluar.index')}}"><i class="far fa-dizzy"></i> <span>Kas Keluar</span></a>
            </li>
            @if(Auth::user()->level == 'Admin')
            <li class="{{(Request::segment(2) == 'kelas' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('kelas.index')}} "><i class="far fa-meh"></i> <span>Data Kelas</span></a>
            </li>
            <li class="{{(Request::segment(2) == 'wali-kelas' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('wali-kelas.index')}}"><i class="far fa-surprise"></i> <span>Data Wali Kelas</span></a>
            </li>
            @endif
            @if(Auth::user()->level == 'Wali Kelas')
            <li class="{{(Request::segment(2) == 'bendahara' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('bendahara.index')}} "><i class="far fa-laugh-squint"></i> <span>Tambah Bendahara</span></a>
            </li>
            @endif
            <li class="{{(Request::segment(2) == 'data-siswa' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('data-siswa.index')}}"><i class="far fa-kiss-wink-heart"></i> <span>Data Siswa</span></a>
            </li>
            @if(Auth::user()->level == 'Admin')
            <li class="{{(Request::segment(2) == 'data-admin' ? 'active' : '')}}">
              <a class="nav-link" href="{{route('data-admin.index')}}"><i class="far fa-grimace"></i> <span>Data Administrator</span></a>
            </li>
            @endif

          </ul>

        </aside>
      </div>