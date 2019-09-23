@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          @include('frontend.components._breadcrumb')

          <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
              <div class="buttons">
                <a href="{{route('bayar.kas')}}" class="btn btn-primary btn-block" style="margin-bottom: 23px;">Bayar Kas</a>
              </div>
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                      {{totalSiswaKelas(Auth::user()->kelas)}}
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-12 col-md-8 col-lg-8">
              <div class="section-body">
              	<!-- Validation -->
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Data Siswa</h4>
                  </div>
                    <div class="card-body">
                    	<ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                        @foreach($datasiswa as $siswa)
                        <li class="media">
                          <a href="{{route('profile.user', $siswa->id)}}"><img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('template/assets/img/avatar/'.showImg($siswa->id))}}"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="{{route('profile.user', $siswa->id)}}"> {{$siswa->name}}</a></div>
                            <div class="text-job text-muted">
                              @if($siswa->tanggal != NULL )
                              Terakhir Bayar Kas : {{date('d M, Y', strtotime($siswa->tanggal))}}
                              @else
                              Belum Pernah Bayar Kas
                              @endif
                            </div>
                          </div>
                          <div class="media-items">
                            <div class="media-item">
                              <div class="media-label">{{number_format($siswa->jumlah)}} </div>
                              <div class="media-label"><small>Total Kas</small></div>
                            </div>
                            <div class="media-item">
                              <div class="media-label">{{kaliBayar($siswa->username)}} Kali </div>
                              <div class="media-label"><small>Bayar Kas</small></div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                    	</ul>
                    </div>
                  <div class="card-footer bg-whitesmoke">
                      {{$datasiswa->render()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection