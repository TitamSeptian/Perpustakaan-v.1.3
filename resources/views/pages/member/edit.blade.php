@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Anggota @endsection
@section('anggota') active @endsection
@section('menu') / Members / Edit {{ $anggota->nama_depan }} @endsection
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
                
            </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('member.update', $anggota->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{{ $anggota->nama_depan }}" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="{{ $anggota->nama_belakang }}" required="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>NISN</label>
                <input type="number" name="nisn" class="form-control" placeholder="11233xxx" value="{{ $anggota->nisn }}" required="">
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" class="form-control" required="">
                            <option value="10" {{ $anggota->kelas == '10' ? "selected" : '' }}>10</option>
                            <option value="11" {{ $anggota->kelas == '11' ? "selected" : '' }}>11</option>
                            <option value="12" {{ $anggota->kelas == '12' ? "selected" : '' }}>12</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name="jurusan" class="form-control" required="">
                            <option value="RPL" {{ ($anggota->Jurusan == 'RPL' ? "selected" : '') }}>RPL</option>
                            <option value="TKJ" {{ ($anggota->Jurusan == 'TKJ' ? "selected" : '') }}>TKJ</option>
                            <option value="AKL" {{ ($anggota->Jurusan == 'AKL' ? "selected" : '') }}>AKL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="Submit" class="btn btn-outline-primary btn-sm pull-right">Edit</button>
            </div>
        </form>
      </div>
      </div>
    </div>
</div>
@endsection
