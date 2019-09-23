@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
              <div class="section-body">
              	<!-- Validation -->
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Data Kas Masuk</h4>
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
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kasmasuk as $km)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$km->nis}}</td>
                            <td>{{$km->nama}}</td>
                            <td>{{$km->kelas}}</td>
                            <td>{{$km->waktu}}</td>
                            <td>Rp. {{number_format($km->jumlah)}}</td>
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