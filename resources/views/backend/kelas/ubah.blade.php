@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kelas</h1>
          </div>
          @if(session('sukses'))
          <div class="alert alert-success">
            {{session('sukses')}}
          </div>
          @endif  			
			      <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Data Kelas</h4>
                  </div>
                  <form action="{{route('kelas.update', $kelas->id)}}" method="POST">
                    {{csrf_field()}}
                  	<input type="hidden" name="_method" value="PATCH">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" name="kelas" id="kelas" class="form-control" value="{{$kelas->kelas}} ">
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Simpan">
                    <a href="{{route('kelas.index')}}" class="btn btn-warning mr-1" >Kembali</a>
                  </div>
                  </form>
                </div>
              </div>
        	</div>
        </section>
    </div>
@stop