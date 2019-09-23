@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Bendahara</h1>
          </div>
          @if(session('sukses'))
          <div class="alert alert-success">
            {{session('sukses')}}
          </div>
          @endif			
			      <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Tambah Bendahara</h4>
                  </div>
                  <form action="{{route('bendahara.store')}}" method="POST">
                  <div class="card-body">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Nomor Induk</label>
                      <input type="text" name="nis" id="nis" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Kelas</label>
                      <select class="form-control" name="kelas" id="kelas">
                      	@if(Auth::user()->level == 'Admin')
                          @foreach($kelas as $kls)
                          <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                          @endforeach
                          @else
                          <option value="{{Auth::user()->kelas}}">{{Auth::user()->kelas}}</option>
                        @endif
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
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Bendahara</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Induk</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($bendahara as $b)
                             <tr>
                              <td>{{$no++}} </td>
                              <td>{{$b->nama}} </td>
                              <td>{{$b->nis}} </td>
                              <td>{{$b->kelas}} </td>
                              <td>{{$b->email}} </td>
                              <td>
                                <form action="{{route('bendahara.destroy', $b->id)}}" method="POST">
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