@extends('backend.components.master')
@section('konten')
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kas Keluar</h1>
          </div>      
      <div class="row">

        <div class="col-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Kas Keluar </h4>
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