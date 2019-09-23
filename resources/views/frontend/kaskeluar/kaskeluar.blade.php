@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
              <div class="section-body">
              	<!-- Validation -->
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Data Kas Keluar</h4>
                  </div>
                  <div class="card-body">
                   	<div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No.</th>
                            <th>Keterangan</th>
                            <th>Kelas</th>
                            <th>Waktu</th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kaskeluar as $kk)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kk->keterangan}}</td>
                            <td>{{$kk->kelas}}</td>
                            <td>{{$kk->tanggal}}</td>
                            <td>Rp. {{number_format($kk->jumlah)}}</td>
                          </tr>
                          @endforeach
                      	</tbody>
                  	  </table>
              		</div>
                  </div>
                </div>
              </div>        
        </section>
      </div>
@endsection