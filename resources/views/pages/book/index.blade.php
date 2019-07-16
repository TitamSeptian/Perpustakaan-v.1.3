@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Buku @endsection
@section('buku') active @endsection
@section('menu') / Book @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
@endsection
@section('content') 
<div class="row">
<div class="col-md-12">
	<div class="card">
	  <div class="card-header">
	  	<div class="row" style="margin-left: .5%;margin-right: .0%;">
	  		<div class="col-md-6">
	    		<h4 class="card-title">Buku</h4>
	  		</div>
	  		<div class="col-md-6">
				<p><a href="{{ route('book.create') }}" class="btn btn-success btn-xs pull-right"><i class="nc-icon nc-simple-add"></i> Tambah</a></p>
	  		</div>
	  	</div>
	  </div>
	  <div class="card-body">
	    <div class="" style="margin-left: 3%;">
	      <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr style="width: 100%">
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($buku as $q)
            <tr style="width: 100%">
                <td>{{$q['judul_buku']}}</td>
                <td>{{$q['penulis']}}</td>
                <td>{{$q['tahun_terbit']}}</td>
                <td class="text-center">
                	<a href="/book/detail/{{ $q->isbn }}/{{ $q['id'] }}" class="btn btn-outline-info btn-sm "> Lihat</a>
                	<a href="{{ route('book.edit', $q['id']) }}" class="btn btn-outline-warning btn-sm "> Edit</a>
                	<a href="{{ route('book.delete',  $q['id']) }}" class="btn btn-outline-danger btn-sm "> Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    		</table>
	    </div>
	  </div>
	</div>
	</div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#example').DataTable();
	});
</script>
@endsection