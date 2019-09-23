@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Siswa</h1>
          </div>

          @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
          @elseif (session('gagal'))
          <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif

			<div class="row">
			  <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Data Siswa</h4>
                      <div class="dropdown">
                          <a href="{{route('data-siswa.create')}}" class="btn btn-success">Tambah</a>
                          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import">Import</a>
                      </div>
                      <div class="dropdown" style="margin-left: 3px;">
                        @if(Auth::user()->level == 'Admin')
                          <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Kelas</a>
                          <div class="dropdown-menu">
                            @foreach($kelas as $kls)
                            <a href="{{route('data-siswa.show', $kls->kelas)}}" class="dropdown-item">{{$kls->kelas}}</a>
                            @endforeach
                          </div>
                          @endif
                      </div>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Total Kas</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($siswa as $sw)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$sw->username}}</td>
                            <td>{{$sw->name}}</td>
                            <td>{{$sw->kelas}}</td>
                            <td>{{$sw->email}}</td>
                            <td>Rp. {{number_format($sw->jumlah)}}</td>
                            <td>
                            	<form action="{{route('data-siswa.destroy', $sw->id)}}" method="POST">
                                <a href="{{route('data-siswa.edit', $sw->id)}} " class="btn btn-icon btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>

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
        </section>
              <!-- Modal Import -->
              <div class="modal fade" tabindex="-1" role="dialog" id="import">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Import Data Siswa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-primary">
                       Fitur import berfungsi untuk menambahkan lebih dari satu data siswa secara bersamaan dengan cara mengupload file Excel (xlsx). Silahkan <a href="{{asset('excel/data-siswa.xlsx')}}"><strong><u>download</u></strong></a> contoh file Excel yang sudah disediakan.
                      </div>

                      <form method="POST" action="{{route('import.siswa')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                      <div class="form-group">
                        <label>Pilih File</label>
                        <input type="file" name="file" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
                        
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal -->
        	</div>
    </div>
@stop