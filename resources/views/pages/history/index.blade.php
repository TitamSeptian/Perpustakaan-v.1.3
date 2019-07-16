@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Riwayat @endsection
@section('riwayat') active @endsection
@section('menu') / History @endsection
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
	    		<h4 class="card-title">Riwayat</h4>
	  		</div>
	  		<div class="col-md-6">
                {{-- <p><a href="" class="pull-right">Trash</a></p> --}}
	  		</div>
	  	</div>
	  </div>
	  <div class="card-body">
	    <div class="" style="margin-left: 3%;">
	      <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr style="width: 100%">
                <th>Nama</th>
                <th>Judul Buku</th>
                {{-- <th>Kategori</th> --}}
                <th>Tanggal Peminjaman</th>
                <th>Lama Peminjaman</th>
                <th>Tanggal Dikembalikan</th>
                <th>Lebih Hari</th>
                <th>denda</th>
                {{-- <th>Status</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($ryt as $q)
            {{-- {{ var_dump($q)}} --}}
            <tr style="width: 100%">
                <td>{{$q->nama_depan}}</td>
                <td >{{$q->judul_buku}}</td>
                <td width="250">{{$q->tanggal_pinjam}} - {{$q->tanggal_kembali}}</td>
                <td>{{$q->lama_hari}} Hari</td>
                <td>{{$q->tanggal_dikembalikan}}</td>
                <td>{{$q->lebih_hari}} Hari</td>
                <td>{{$q->denda}}</td>
                <td class="text-center">
                	<a href="{{ route('kembali.soft', $q->id) }}" class="btn btn-sm btn-outline-danger"> Hapus</a>
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
	
    // let ntgl = $('.kmbl').html();
    // // console.info(ntgl);
    // let now = new Date();
    // let entry = new Date(ntgl);
    // entry.setHours(0);
    // entry.setMinutes(0);
    // entry.setSeconds(0);
    // entry.setMilliseconds(0);

    // let stts = now < entry;

    // //fungsi selisih tanggal
    // function selisih_tanggal(nDate){
    //     var tgl2 = new Date(nDate);
    //     now.setHours(0);
    //     now.setMinutes(0);
    //     now.setSeconds(0);
    //     now.setMilliseconds(0);
    //     var selisih = Math.abs(now - tgl2)/86400000;
    //     let jmlHari = now < tgl2;
    //     if (!jmlHari) { 
    //         return selisih;
    //     }
    //     else{
    //         return selisih;
    //     }
    // }
    // let Newntgl = $('.kmbl').html();
    // var hTelat = selisih_tanggal(Newntgl);

    // function telat(nTelat) {
    //     if (nTelat == 0) {
    //         return'';
    //     }else{
    //        return`(${hTelat} Hari)` ;
    //     }
    // }
    // let res =``;
    // if ( stts ) {
    //     // console.info('ok');
    //     res =  `
    //         <div class="badge badge-success word-wrap">
    //             Masih dalam Peminjaman.
    //         </div>
    //         `
    // }else{
    //     // console.info('no');
    //     res =  `
    //         <div class="badge badge-danger">
    //             Sudah Telat.${telat(hTelat)}
    //         </div>
    //         `
    // }

    // $('.lebih').html(res);

    });
</script>
@endsection