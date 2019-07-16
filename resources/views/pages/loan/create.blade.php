@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Peminjaman @endsection
@section('peminjaman') active @endsection
@section('menu') / loans / Create @endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content') 
<div class="row">
<div class="col-md-12">
	<div class="card">
	  <div class="card-header">
	  	<div class="row" style="margin-left: .5%;margin-right: .0%;">
	  		<div class="col-md-6">
	    		<h4 class="card-title">Peminjaman</h4>
	  		</div>
	  		<div class="col-md-6">
				
	  		</div>
	  	</div>
	  </div>
	  <div class="card-body">
	  	<form method="POST" action="{{ route('loan.store') }}">
	  		{{ csrf_field() }}
	  		<div class="row">
	  			<div class="col-md-4">
	  				<div class="form-group">
			            <label>Anggota</label>
						<select name="id_anggota" required="" class="form-control select2">
							@foreach($anggota as $a)
								<option value="{{ $a['id'] }}">{{ $a['nama_depan'].' '.$a['nama_belakang'] }}</option>
							@endforeach							
						</select>
			        </div>
	  			</div>
	  			<div class="col-md-4">
	  				<div class="form-group">
			            <label>Buku</label>
						<select name="id_buku" required="" class="form-control select2">
							@foreach($buku as $b)
								<option value="{{ $b['id'] }}">{{ $b['judul_buku'] }}</option>
							@endforeach							
						</select>
			        </div>
	  			</div>
	  			<div class="col-md-4">
	  				<div class="form-group">
			            <label>Lama Peminjaman (Hari)</label>
						<input type="number" name="lama_hari" min="1" required="" class="form-control">
			        </div>
	  			</div>
	  		</div>
	        <div class="form-group">
	            <button type="Submit" class="btn btn-outline-primary btn-sm pull-right">Tambah</button>
	        </div>
	    </form>
	  </div>
	  </div>
	</div>
	</div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('.select2').select2();
    });
</script>
@endsection