@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Peminjaman @endsection
@section('peminjaman') active @endsection
@section('menu') / Returns {{$pjn->judul_buku}} @endsection
@section('css')
@endsection
@section('content') 
<div class="row">
    <div class="col-md-12">
    	<div class="card">
    	  <div class="card-header">
    	  	<div class="row" style="margin-left: .5%;margin-right: .0%;">
    	  		<div class="col-md-6">
    	    		<h4 class="card-title">Pengembalian</h4>
    	  		</div>
    	  		<div class="col-md-6">
                    
    	  		</div>
    	  	</div>
    	  </div>
    	</div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Info Buku
                <hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset("bukus/$pjn->gambar_buku") }}" alt="{{ $pjn->judul_buku }}" class="img-thumbnail">
                    </div>
                    <div class="col-md-7">
                        <table>
                            <tr>
                                <td>Judul Buku</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td>{{ $pjn->judul_buku }}</td>
                            </tr>
                            <tr>
                                <td>ISBN</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td>{{ $pjn->isbn }}</td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td>{{ $pjn->penerbit }}</td>
                            </tr>
                            <tr>
                                <td>Penulis</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td>{{ $pjn->penulis }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Hlaman</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td>{{ $pjn->jumlah_halaman }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Info Anggota
                <hr>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>NISN</td>
                        <td>&nbsp;:</td>
                        <td>{{ $pjn->nisn }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;:</td>
                        <td>{{ $pjn->nama_depan .' '. $pjn->nama_belakang }}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>&nbsp;:</td>
                        <td>{{ $pjn->kelas }}</td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>&nbsp;:</td>
                        <td>{{ $pjn->Jurusan }}</td>
                    </tr>
                    <tr>
                        <td>TTL</td>
                        <td>&nbsp;:</td>
                        <td>{{ $pjn->tanggal_lahir }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Peminjaman
                <hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        {{-- {{ var_dump($id) }} --}}
                        <table>
                            <tr>
                                <td>Tanggal Pinjamn</td>
                                <td>&nbsp;:</td>
                                <td>{{ $pjn->tanggal_pinjam }}</td>
                            </tr>
                            <tr>
                                <td>Lama Pinjamn</td>
                                <td>&nbsp;:</td>
                                <td>{{ $pjn->lama_hari }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembali</td>
                                <td>&nbsp;:</td>
                                <td class="kmbl">{{ $pjn->tanggal_kembali }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dikembalikan (Sekarang)</td>
                                <td>&nbsp;:</td>
                                <td class="now"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('kembali.pro', $id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Lebih Hari</label>
                                <input type="text" name="lebih_hari" id="element" class="form-control" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Denda</label>
                                <input type="text" name="denda" id="denda" class="form-control" readonly="">
                            </div>
                    </div>
                </div>
                    <div class="card-footer">
                        <hr>
                        <input type="submit" name="" class="btn btn-sm btn-outline-success float-right" value="Kembalikan">
                    </div>
            </div>
        </div>
           </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	
    let ntgl = $('.kmbl').html();
    // console.info(ntgl);
    let now = new Date();
    let entry = new Date(ntgl);
    entry.setHours(0);
    entry.setMinutes(0);
    entry.setSeconds(0);
    entry.setMilliseconds(0);

    let stts = now < entry;

    //fungsi selisih tanggal
    function selisih_tanggal(nDate){
        var tgl2 = new Date(nDate);
        now.setHours(0);
        now.setMinutes(0);
        now.setSeconds(0);
        now.setMilliseconds(0);
        var selisih = Math.abs(now - tgl2)/86400000;
        let jmlHari = now < tgl2;
        if (!jmlHari) { 
            return selisih;
        }
        else{
            return selisih;
        }
    }
    let Newntgl = $('.kmbl').html();
    var hTelat = selisih_tanggal(Newntgl);
    if (stts) {
        $('#element').attr('value', '0');
    }else{
        $('#element').attr('value', hTelat);
    }


    var elemenDate = $('input[name="tgl"]').attr('value');
    var mydate = new Date(now);
    var month = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"][mydate.getMonth()];
    var str = mydate.getDate() + " " + month + ' ' + mydate.getFullYear();
    $('.now').html(str);
    if ((hTelat) == 0) {
        $('#denda').attr('value', 0);
    }else{
        let denda = 1500 * hTelat;
        if ($('#element').val() == '0') {
            // alert('ok')
            $('#denda').attr('value', 0);
        }else{
            $('#denda').attr('value', denda);
        }
    }

    });
</script>
@endsection