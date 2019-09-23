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
                <div class="card card-success">
                  <div class="card-header">
                    <h4>Rincian Kas: {{Auth::user()->name}}</h4>
                  </div>
                  <div class="card-body">
                  	<div class="summary">
	                    <div class="summary-info">
	                      <h4>Rp. {{number_format(Auth::user()->jumlah)}}</h4>
	                      <div class="text-muted">Total Kas Anda Yang Sudah Terkonfirmasi</div>
	                    </div>
	                    <div class="summary-item">
	                      <ul class="list-unstyled list-unstyled-border">
	                      	@foreach($kasmasuk as $km)
	                        <li class="media">
	                          <div class="media-body">
	                            <div class="media-right">Rp. {{number_format($km->jumlah)}} </div>
	                            <div class="media-title">{{date('d M, Y H:i:s', strtotime($km->waktu))}}</div>
	                            <div class="text-muted text-small">
	                            	@if($km->status == 'Terkonfirmasi')
	                            	<div class="badge badge-success badge-sm">{{$km->status}}</div>
	                            	@else
	                            	<div class="badge badge-warning badge-sm">{{$km->status}}</div>
	                            	@endif
	                            </div>
	                          </div>
	                        </li>
	                        @endforeach
	                      </ul>
	                      <div class="dropdown-divider"></div>
	                      	{{$kasmasuk->render()}}
	                    </div>
                  	</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection