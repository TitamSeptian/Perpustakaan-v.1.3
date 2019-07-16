@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Buku @endsection
@section('buku') active @endsection
@section('menu') / Book / Edit {{ $buku->judul_buku }} @endsection
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
                
            </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('book.edit', $buku->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" value="{{ $buku->judul_buku }}">
            </div>
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="isbn" class="form-control" placeholder="Judul Buku" value="{{ $buku->isbn }}">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ $buku->penerbit }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" class="form-control" placeholder="Penulis" {{ $buku->penulis }}>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        {{-- <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit"> --}}
                        <select name="tahun_terbit" required="" class="form-control">
                            @for($i = 1987; $i<= $date = (int)date('Y'); $i++)
                                <option value="{{ $i }}" {{ ($buku->tahun_terbit == $i ? "selected" : '') }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori"  class="form-control" required="">
                            @foreach($kategori as $q)
                                <option value="{{ $q['id'] }}" {{ ($buku->id_kategori == $q['id'] ? "selected" : '') }}>{{ $q['nama_kategori'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah Halaman</label>
                        <input type="number" name="jumlah_halaman"  class="form-control" required placeholder="Jumlah Halaman" min="1" value="{{ $buku->jumlah_halaman }}">
                    </div>
                </div>
            </div>
            <div class="form-gruop">
                <label>Sinopsis</label>
                <textarea name="sinopsis" class="form-control" required placeholder="Sinopsis ...">{{$buku->sinopsis}}</textarea>
            </div>
            <br>
            <img src="{{ asset("/bukus/$buku->gambar_buku") }}" class="img-fluid" alt="Responsive image">
            <input type="hidden" name="gambar_buku_hidden" value="{{ $buku->gambar_buku }}">
            <hr>
            <div class="form-gruop">
                <label>Gambar</label>
                <input type="file" name="gambar_buku" class="form-control">
            </div>

            
            {{-- @if($errors->has('kategori'))
                <div class="text-danger">
                    {{ $errors->first('kategori')}}
                </div>
            @endif --}}

            <div class="form-group">
                <button type="Submit" class="btn btn-outline-primary btn-sm pull-right">Edit</button>
            </div>
        </form>
      </div>
      </div>
    </div>
</div>
@endsection
