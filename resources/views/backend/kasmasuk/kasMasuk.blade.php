@extends('backend.components.master')
@section('konten')
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kas Masuk</h1>
          </div>			
			<div class="row">
			  <div class="col-12">
                @if(session('sukses'))
                  <div class="alert alert-success">{{session('sukses')}}</div>
                @endif
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Kas Masuk</h4>
                    <!-- <div class="card-header-action"> -->
                      @if(Auth::user()->level == 'Admin')
                      <div class="dropdown" style="margin-right: 5px;">
                          <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilih Kelas</a>
                            <div class="dropdown-menu">
                              @foreach($kelas as $kls)
                              <a href="{{route('kas-masuk.show', $kls->kelas)}}" class="dropdown-item">{{$kls->kelas}}</a>
                              @endforeach
                            </div>
                      </div>
                      @endif
                      @if(Auth::user()->level == 'Wali Kelas' || Auth::user()->level == 'Bendahara')
                      <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning daterange-btn icon-left btn-icon dropdown-toggle"><i class="fas fa-download"></i> Download </a>
                            <div class="dropdown-menu">
                              <a href="{{route('export.kas.masuk', 7)}}" class="dropdown-item">7 Hari Terakhir</a>
                              <a href="{{route('export.kas.masuk', 30)}}" class="dropdown-item">30 Hari Terakhir</a>
                              <a href="{{route('export.kas.masuk', date('m'))}}" class="dropdown-item">Bulan Ini</a>
                              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#export">Pilih Tanggal</a>
                            </div>
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
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                            @if(Auth::user()->level == 'Bendahara')
                            <th>Aksi</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kasmasuk as $km)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$km->nis}}</td>
                            <td>{{$km->nama}}</td>
                            <td>{{$km->kelas}}</td>
                            <td>{{date('d M, Y H:i:s', strtotime($km->waktu))}}</td>
                            <td>
                              @if($km->status == 'Terkonfirmasi')
                              <div class="badge badge-success">{{$km->status}}</div>
                              @else
                              <div class="badge badge-warning">{{$km->status}}</div>
                              @endif
                            </td>
                            <td>Rp. {{number_format($km->jumlah)}}</td>
                            @if(Auth::user()->level == 'Bendahara')
                            <td>
                              @if($km->status == 'Pending')
                              <form method="POST" action="{{route('konfirmasi', $km->id)}}">
                                {{csrf_field()}}
                                 <input type="hidden" name="_method" value="PUT">
                            	   <button type="submit" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="Konfirmasi"></i></button>
                              </form>
                              @endif

                            	<form method="POST" action="{{route('kas-masuk.destroy', $km->id)}}">
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

        <!-- Modal Export -->
              <div class="modal fade" tabindex="-1" role="dialog" id="export">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Download Berdasarkan Tanggal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form method="POST" action="{{route('export.between.kas.masuk')}}">
                        {{csrf_field()}}

                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="from" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="to" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-primary">Download</button>
                        
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal -->

    </div>
@stop