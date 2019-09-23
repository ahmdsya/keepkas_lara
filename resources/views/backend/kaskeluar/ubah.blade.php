@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Kas Keluar</h1>
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
                    <h4>Ubah Kas Keluar</h4>
                  </div>
                  <div class="card-body">
                  	<form action="{{route('kas-keluar.update', $kaskeluar->id)}}" method="POST">
                  		{{csrf_field()}}
                  	<input type="hidden" name="_method" value="PATCH">
                  	<div class="form-group row">
                      <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                      <div class="col-sm-5">
                      	<textarea class="form-control" name="keterangan" id="ket">{{$kaskeluar->keterangan}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-5">
                        <input type="date" name="tanggal" class="form-control" id="tgl" value="{{$kaskeluar->tanggal}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-5">
                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{$kaskeluar->jumlah}}">
                      </div>
                    </div>
                    <div class="form-group row">
                    	<label class="col-sm-2 col-form-label"></label>
                    	<div class="col-sm-5">
                      		<button type="submit" class="btn btn-primary">Simpan</button>
                          <a href="{{route('kas-keluar.index')}}" class="btn btn-warning">Kembali</a>
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