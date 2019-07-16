@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Buku @endsection
@section('buku') active @endsection
@section('menu') / Book / Detail {{ $buku->judul_buku }} @endsection
@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="row" style="margin-left: .5%;margin-right: .0%;">
                <div class="col-md-6">
                    <h4 class="card-title">Buku {{ $buku->judul_buku }}</h4>
                </div>
                <div class="col-md-6">
                    <p><a href="{{ route('book.index') }}">Kembali</a></p>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset("/bukus/$buku->gambar_buku") }}" class="rounded" alt="{{ $buku->judul_buku }}" height="350" height="600">
                </div>
                <hr>
                <table>
                    <tr>
                        <td>ISBN</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->isbn }}</td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->judul_buku }}</td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->penulis }}</td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->penerbit }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Halaman</td>
                        <td>&nbsp;&nbsp; :</td>
                        <td>{{ $buku->jumlah_halaman }}</td>
                    </tr>
                </table>
                <br>
                <label>Sinopsis</label><br>
                <p>
                    {{ $buku->sinopsis }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
