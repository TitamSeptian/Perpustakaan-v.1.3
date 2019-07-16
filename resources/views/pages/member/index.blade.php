@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Anggota @endsection
@section('anggota') active @endsection
@section('menu') / Members @endsection
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
	    		<h4 class="card-title">Anggota</h4>
	  		</div>
	  		<div class="col-md-6">
				<p><a href="{{ route('member.create') }}" class="btn btn-success btn-xs pull-right"><i class="nc-icon nc-simple-add"></i> Tambah</a></p>
	  		</div>
	  	</div>
	  </div>
	  <div class="card-body">
	    <div class="" style="margin-left: 3%;">
	      <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr style="width: 100%">
                <th>Nama</th>
                <th>Kelas</th>
                {{-- <th>Jurusan</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($anggota as $q)
            <tr style="width: 100%">
                <td>{{$q['nama_depan'].' '.$q['nama_belakang']}}</td>
                <td>{{$q['kelas']}}</td>
                {{-- <td>{{$q['Jurusan']}}</td> --}}
                <td class="text-right">
                	<a href="/member/detail/{{ $q['nama_depan'] }}/{{ $q['id'] }}" class="btn btn-outline-info btn-sm ">Lihat</a>
                	<a href="{{ route('member.edit', $q['id']) }}" class="btn btn-outline-warning btn-sm "> Edit</a>
                	<a href="{{ route('member.delete', $q['id']) }}" class="btn btn-outline-danger btn-sm "> Hapus</a>
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