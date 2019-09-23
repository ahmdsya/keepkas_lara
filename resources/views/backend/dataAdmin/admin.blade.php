@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Administrator</h1>
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
                    <h4>Tambah Data Administrator</h4>
                  </div>
                  <form action="{{route('data-admin.store')}}" method="POST">
                  <div class="card-body">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="name"  class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password"  class="form-control" required>
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
                    <h4>Data Administrator</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($admins as $ad)
                             <tr>
                              <td>{{$no++}} </td>
                              <td>{{$ad->name}} </td>
                              <td>{{$ad->email}} </td>
                              <td>
                              	@if($ad->id == Auth::user()->id)
                              	  <a href="{{route('admin.profile')}}" class="btn btn-icon btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Profil Anda"><i class="fas fa-user"></i></a>
                              	@else
                                <form action="{{route('data-admin.destroy', $ad->id)}}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-times"></i></button>
                                </form>
                              	@endif
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