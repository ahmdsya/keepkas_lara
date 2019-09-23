@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profil</h1>
          </div>

          @if(session('sukses'))
            <div class="alert alert-success">
              {{session('sukses')}}
            </div>
          @elseif(session('gagal'))
            <div class="alert alert-danger">
              {{session('gagal')}}
            </div>
          @endif

			      <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Ubah Profil</h4>
                  </div>
                  <form action="{{route('admin.ubah.profile')}}" method="POST">
                  <div class="card-body">
                      {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Simpan">
                  </div>
                  </form>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Ubah Password</h4>
                  </div>
                  <div class="card-body">

                    <form method="POST" action="{{route('admin.ubah.password')}}">
                    	{{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label>Password Lama</label>
                      <input type="password" name="lama" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="password" name="baru" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Ulangi Password</label>
                      <input type="password" name="ulangi" class="form-control" required>
                    </div>

                    <div class="card-footer text-right">
	                    <input type="submit" class="btn btn-primary mr-1" value="Simpan">
	                </div>
	                </form>

                  </div>
                </div>
              </div>

        	</div>
        </section>
    </div>
@stop