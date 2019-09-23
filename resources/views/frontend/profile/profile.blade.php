@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          @include('frontend.components._breadcrumb')

          @if(session('gagal'))
          <div class="alert alert-danger">
            {{session('gagal')}}
          </div>
          @elseif(session('sukses'))
          <div class=" alert alert-success">
            {{session('sukses')}}
          </div>
         @endif

          <div class="row">
            
            <div class="col-12 col-md-6 col-lg-6">
              <div class="section-body">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Profile</h4>
                  </div>
                  <div class="card-body">
                  	<ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('template/assets/img/avatar/'.showImg($getUser->id))}}">
                        <div class="media-body">
                          <div class="media-title">{{$getUser->name}}</div>
                          <div class="text-job text-muted">
                            @if($getUser->tanggal != NULL )
                            Terakhir Bayar Kas : {{date('d M, Y', strtotime($getUser->tanggal))}}
                            @else
                            Belum Pernah Bayar Kas
                            @endif
                          </div>
                        </div>
                        <div class="media-items">
                          <div class="media-item">
                            <div class="media-label">{{number_format($getUser->jumlah)}} </div>
                            <div class="media-label"><small>Total Kas</small></div>
                          </div>
                          <div class="media-item">
                            <div class="media-label">{{kaliBayar($getUser->username)}} Kali </div>
                            <div class="media-label"><small>Bayar Kas</small></div>
                          </div>
                        </div>
                      </li>
                  	</ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
            	<div class="card author-box card-primary">
                  <div class="card-body">
            		<div class="author-box-left">
                      <img alt="image" src="{{asset('template/assets/img/avatar/'.showImg($getUser->id))}}" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      @if(Auth::user()->id == $getUser->id)
                      <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#ubahfoto">Edit Foto</a>
                      @endif
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        {{$getUser->name}}
                        @if(Auth::user()->id == $getUser->id)
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahpassword">Ubah Password</button>
                        @endif
                      </div>
                      <div class="author-box-description">
                        <form method="POST" action="{{route('ubah.profil')}}">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                              @if(Auth::user()->id == $getUser->id)
                              <input type="text" class="form-control" id="name" value="{{$getUser->name}}" readonly>
                              @else
                              {{$getUser->name}}
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="nis" class="col-sm-4 col-form-label">Nomor Induk</label>
                            <div class="col-sm-8">
                              @if(Auth::user()->id == $getUser->id)
                              <input type="text" class="form-control" id="nis" value="{{$getUser->username}}" readonly>
                              @else
                              {{$getUser->username}}
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                              @if(Auth::user()->id == $getUser->id)
                              <input type="text" class="form-control" id="kelas" value="{{$getUser->kelas}}" readonly>
                              @else
                              {{$getUser->kelas}}
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              @if(Auth::user()->id == $getUser->id)
                              <input type="email" name="email" class="form-control" id="email" value="{{$getUser->email}}">
                              @else
                              {{$getUser->email}}
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                              @if(Auth::user()->id == $getUser->id)
                              <input type="submit" class="btn btn-primary" value="Simpan">
                              @endif
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
            	</div>
            </div>


          </div>
        </section>

            <!-- Modal Edit Foto -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ubahfoto">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ubah Foto Profil</h5>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('ubah.foto.profil')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">Pilih Foto</label>
                        <div class="col-sm-9">
                          <input type="file" name="foto" class="form-control" id="foto" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <input type="submit" class="btn btn-primary" value="Simpan">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->

             <!-- Modal Edit Password -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ubahpassword">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('ubah.password.user')}}">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group row">
                        <label for="lama" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col-sm-9">
                          <input type="password" name="lama" class="form-control" id="lama" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                          <input type="password" name="baru" class="form-control" id="baru" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="ulangi" class="col-sm-3 col-form-label">Ulangi Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="ulangi" class="form-control" id="ulangi" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <input type="submit" class="btn btn-primary" value="Simpan">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->

      </div>
@endsection