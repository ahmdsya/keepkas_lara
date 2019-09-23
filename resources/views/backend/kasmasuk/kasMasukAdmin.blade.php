@extends('backend.components.master')
@section('konten')
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kas Masuk</h1>
          </div>      
      <div class="row">

        <div class="col-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Kas Masuk </h4>
                    <!-- <div class="card-header-action"> -->
                      @if(Auth::user()->level == 'Admin')
                      <div class="dropdown">
                          <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilih Kelas</a>
                          <div class="dropdown-menu">
                            @foreach($kelas as $kls)
                            <a href="{{route('kas-masuk.show', $kls->kelas)}}" class="dropdown-item">{{$kls->kelas}}</a>
                            @endforeach
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
                            <td><div class="badge badge-success">{{$km->status}}</div></td>
                            <td>Rp. {{number_format($km->jumlah)}}</td>
                            @if(Auth::user()->level == 'Bendahara')
                            <td>
                              <a href="#" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                              <a href="#" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-times"></i></a>
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