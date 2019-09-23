@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Wali Kelas</h1>
          </div>
          @if(session('sukses'))
          <div class="alert alert-success">
            {{session('sukses')}}
          </div>
          @endif			
			      <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Tambah Data Wali Kelas</h4>
                  </div>
                  <form action="{{route('wali-kelas.store')}}" method="POST">
                  <div class="card-body">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Kelas</label>
                      <select class="form-control" name="kelas" id="kelas">
                      	@foreach($kelas as $kls)
                      	<option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                      	@endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>

              <div class="col-12 col-md-8 col-lg-8">
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Data Wali Kelas</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($wali as $w)
                             <tr>
                              <td>{{$no++}} </td>
                              <td>{{$w->nama}} </td>
                              <td>{{$w->kelas}} </td>
                              <td>{{$w->email}} </td>
                              <td>
                                <form action="{{route('wali-kelas.destroy', $w->id)}}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-times"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                      	</tbody>
                  	  </table>
              		</div>

                  </div>
                </div>
              </div>

        	</div>
        </section>
    </div>
@stop