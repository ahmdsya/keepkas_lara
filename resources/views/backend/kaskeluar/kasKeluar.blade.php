@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kas Keluar</h1>
          </div>			
			<div class="row">
			  <div class="col-12">
                @if(session('sukses'))
                  <div class="alert alert-success">{{session('sukses')}}</div>
                @endif
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Kas Keluar</h4>
                    <!-- <div class="card-header-action"> -->
                      @if(Auth::user()->level == 'Admin')
                      <div class="dropdown">
                          <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilih Kelas</a>
                          <div class="dropdown-menu">
                            @foreach($kelas as $kls)
                            <a href="{{route('kas-keluar.show', $kls->kelas)}}" class="dropdown-item">{{$kls->kelas}}</a>
                            @endforeach
                          </div>
                      </div>
                      @endif
                      @if(Auth::user()->level == 'Bendahara')
                      <div class="dropdown">
                          <a href="{{route('kas-keluar.create')}}" class="btn btn-success">Tambah Kas Keluar</a>
                      </div>
                      @endif
                    <!-- </div> -->
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Keterangan</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            @if(auth()->user()->level == 'Bendahara')
                            <th>Aksi</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kaskeluar as $kl)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kl->keterangan}}</td>
                            <td>{{$kl->kelas}}</td>
                            <td>{{date('d M, Y', strtotime($kl->tanggal))}}</td>
                            <td>Rp. {{number_format($kl->jumlah)}}</td>
                            @if(Auth::user()->level == 'Bendahara')
                            <td>
                              <form method="POST" action="{{route('kas-keluar.destroy', $kl->id)}}">
                            	   <a href="{{route('kas-keluar.edit', $kl->id)}}" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah"></i></a>
                                 {{csrf_field()}}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-times" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                               </form>
                            </td>
                            @endif
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