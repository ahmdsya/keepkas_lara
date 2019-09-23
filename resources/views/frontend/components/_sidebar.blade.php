			<div class="col-12 col-md-4 col-lg-4">
              <div class="buttons">
                <a href="{{route('bayar.kas')}}" class="btn btn-primary btn-block" style="margin-bottom: 23px;">Bayar Kas</a>
              </div>

                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-user"></i>
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

                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-user"></i>
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

                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Saldo Kas</h4>
                    </div>
                    <div class="card-body">
                      Rp. {{number_format(totalSaldoKelas(Auth::user()->kelas))}}
                    </div>
                  </div>
                </div>
            </div>