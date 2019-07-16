@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Anggota @endsection
@section('anggota') active @endsection
@section('menu') / Members / Create @endsection
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
        <form method="POST" action="{{ route('member.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>NISN</label>
                <input type="number" name="nisn" class="form-control" placeholder="11233xxx" >
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name="jurusan" class="form-control">
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="AKL">AKL</option>
                        </select>
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
@endsection
