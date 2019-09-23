@extends('frontend.components.master')
@section('konten')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          @include('frontend.components._breadcrumb')

          <div class="row">
            @include('frontend.components._sidebar')

            <div class="col-12 col-md-8 col-lg-8">
              <div class="section-body">
              	<!-- Validation -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Bayar Kas</h4>
                  </div>
                  <div class="card-body">
                  		<div style="text-align: center;">
                  			<h4>Silahkan Masukkan Nominal</h4>
                  			@if(session('sukses'))
                  			<div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            {{session('sukses')}}
                          </div>
                        </div>
                  			@endif
                    		<form method="POST" action="{{route('bayar.kas.submit')}}">
                    			{{csrf_field()}}
                    			<input type="number" name="jumlah" class="form-control" placeholder="10000" required>
                        	<button type="submit" class="btn btn-danger" style="margin-top: 15px;">BAYAR</button>
                    		</form>
                    	</div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
@endsection