@extends('backend.components.master')
@section('konten')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
            @if(Auth::user()->level == 'Wali Kelas' || Auth::user()->level == 'Bendahara')
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-calendar-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Kas Masuk</h4>
                    </div>
                    <div class="card-body">
                      Rp. {{number_format(totalKasMasukKelas(Auth::user()->kelas))}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-calendar-minus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Kas Keluar</h4>
                    </div>
                    <div class="card-body">
                      Rp. {{number_format(totalKasKeluarKelas(Auth::user()->kelas))}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-calendar-check"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Saldo</h4>
                    </div>
                    <div class="card-body">
                      Rp. {{number_format(totalSaldoKelas(Auth::user()->kelas))}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Siswa</h4>
                    </div>
                    <div class="card-body">
                      {{totalSiswaKelas(Auth::user()->kelas)}}
                    </div>
                  </div>
                </div>
              </div>                  
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Statistik Kas Masuk Bulan {{bulan()}} </h4>
                  </div>
                  <div class="card-body">
                    @if($getData->count() >= 1)
                    <div style="width:100%;">
                        {!! $chartjs->render() !!}
                    </div>
                    @else
                    <center>
                      <h4>Tidak Ada Data Statistik Bulan {{bulan()}}</h4>
                    </center>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endif
          <div class="section-body">

            <center>
              <h4 style="margin-top: 150px;">Selamat Datang</h4><br>
              <h2>KeepKas - Aplikasi Uang Kas Kelas</h2><br>
            </center>

          </div>
        </section>
      </div>
@stop