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
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Tambah Data Kelas</h4>
                  </div>
                  <form action="{{route('kelas.store')}}" method="POST">
                  <div class="card-body">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" name="kelas" id="kelas" class="form-control" required>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>

              <div class="col-12 col-md-8 col-lg-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Data Kelas</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kelas as $kls)
                             <tr>
                              <td>{{$no++}} </td>
                              <td>{{$kls->kelas}} </td>
                              <td>
                                <form action="{{route('kelas.destroy', $kls->id)}}" method="POST">
                                <a href="{{route('kelas.edit', $kls->id)}} " class="btn btn-icon btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>

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