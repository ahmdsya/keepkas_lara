@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          @include('frontend.components._breadcrumb')

          <div class="row">
            @include('frontend.components._sidebar')

            <div class="col-12 col-md-8 col-lg-8">
              <div class="section-body">
              	<!-- Validation -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Siswa</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme" id="users-carousel">
                      @foreach($users as $user)
                      <div>
                        <div class="user-item">
                          <img alt="image" src="{{asset('template/assets/img/avatar/'.showImg($user->id))}}" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">{{$user->name}} </div>
                            <div class="text-job text-muted">Rp. {{number_format($user->jumlah)}}</div>
                            <div class="user-cta">
                              <a href="{{route('profile.user', $user->id)}}" class="btn btn-primary">Profile</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                      <a href="{{route('data.user')}}" class="btn btn-danger btn-icon icon-right">Lihat Semua<i class="fas fa-chevron-right"></i></a>
                    </div>
                  </div>
                </div>

                <div class="card card-success">
                  <div class="card-body">
                    <div class="summary">
                      <div class="summary-info">
                        <h4>Rp. {{number_format(Auth::user()->jumlah)}}</h4>
                        <div class="text-muted">Total Kas Anda</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
@endsection