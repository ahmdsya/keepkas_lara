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
                    <h4>Ubah Data Siswa</h4>
                  </div>
                  <div class="card-body">
                  	<form action="{{route('data-siswa.update', $siswa->id)}} " method="POST">
                    	{{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                  	<div class="form-group row">
                      <label for="nis" class="col-sm-2 col-form-label">Nomor Induk</label>
                      <div class="col-sm-5">
                        <input type="text" name="username" class="form-control" id="nis" value="{{$siswa->username}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" id="name" value="{{$siswa->name}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-5">
                        <select name="kelas" id="kelas" class="form-control">
                        	@if(Auth::user()->level == 'Admin')
                        	<option value="{{$siswa->kelas}}">{{$siswa->kelas}}</option>
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
                        <input type="text" name="email" class="form-control" id="email" value="{{$siswa->email}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                    	<label for="email" class="col-sm-2 col-form-label"></label>
                    	<div class="col-sm-5">
                      		<input type="submit" class="btn btn-primary mr-1" value="Simpan">
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