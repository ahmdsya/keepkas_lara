@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Siswa</h1>
          </div>

          @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
          @endif

			<div class="row">
			  <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Tambah Data Siswa</h4>
                  </div>
                  <div class="card-body">
                  	<form action="{{route('data-siswa.store')}}" method="POST">
                  		{{csrf_field()}}
                  	<div class="form-group row">
                      <label for="nis" class="col-sm-2 col-form-label">Nomor Induk</label>
                      <div class="col-sm-5">
                        <input type="text" name="username" class="form-control" id="nis" placeholder="Nomor Induk" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-5">
                        <select name="kelas" id="kelas" class="form-control">
                          @if(Auth::user()->level == 'Admin')
                        	@foreach($kelas as $kls)
                        	<option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                        	@endforeach
                          @else
                          <option value="{{Auth::user()->kelas}}">{{Auth::user()->kelas}}</option>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-5">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                    	<label for="email" class="col-sm-2 col-form-label"></label>
                    	<div class="col-sm-5">
                      		<button type="submit" class="btn btn-primary">Tambah</button>
                          <a href="{{route('data-siswa.index')}}" class="btn btn-warning">Kembali</a>
                      </div>
                    </div>
                    </form>

                  </div>
                </div>
              </div>
          	</div>
        </section>
    </div>
@stop