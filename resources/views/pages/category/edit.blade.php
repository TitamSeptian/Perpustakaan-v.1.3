@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Kategori @endsection
@section('kategori') active @endsection
@section('menu') / Catergory / Edit {{ $kategori->nama_kategori }} @endsection
@section('content') 
<div class="row">
<div class="col-md-12">
	<div class="card">
	  <div class="card-header">
	  	<div class="row" style="margin-left: .5%;margin-right: .0%;">
	  		<div class="col-md-6">
	    		<h4 class="card-title">Kategori</h4>
	  		</div>
	  		<div class="col-md-6">
				
	  		</div>
	  	</div>
	  </div>
	  <div class="card-body">
	  	<form method="POST" action="{{ route('category.update' , $kategori->id) }}">
	  		{{ csrf_field() }}
	  		{{ method_field('PUT') }}
			<div class="form-group">
	            <label>Nama Kategori</label>
	            <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ $kategori->nama_kategori }}" >
	        </div>
	        
	        @if($errors->has('kategori'))
                <div class="text-danger">
                    {{ $errors->first('kategori')}}
                </div>
            @endif

	        <div class="form-group">
	            <button type="Submit" class="btn btn-outline-primary btn-sm pull-right">Edit</button>
	        </div>
	    </form>
	  </div>
	  </div>
	</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    
    });
</script>
@endsection