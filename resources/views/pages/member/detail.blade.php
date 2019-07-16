@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Anggota @endsection
@section('anggota') active @endsection
@section('menu') / Members / {{ $anggota->nama_depan .' '. $anggota->nama_belakang }} @endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">{{ $anggota->nama_depan .' '. $anggota->nama_belakang }}</h4>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right"><a href="{{ route('member.index') }}">Kembali</a></p>
                    </div>
                </div>
              </div>
              <div class="card-body">
                  <table>
                    <tr>
                          <td>NISN</td>
                          <td>&nbsp;:</td>
                          <td>{{ $anggota->nisn }}</td>
                      </tr>
                      <tr>
                          <td>Nama</td>
                          <td>&nbsp;:</td>
                          <td>{{ $anggota->nama_depan .' '. $anggota->nama_belakang }}</td>
                      </tr>
                      <tr>
                          <td>Kelas</td>
                          <td>&nbsp;:</td>
                          <td>{{ $anggota->kelas }}</td>
                      </tr>
                      <tr>
                          <td>Jurusan</td>
                          <td>&nbsp;:</td>
                          <td>{{ $anggota->Jurusan }}</td>
                      </tr>
                  </table>
                  <input type="hidden" name="tgl" value="{{ $anggota->created_at }}">
              </div>
              <div class="card-footer">
                <hr>
                <p class="pull-right tgl"></p>
              </div>
          </div>  
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var elemenDate = $('input[name="tgl"]').attr('value');
        // console.info(elemenDate);
        var mydate = new Date(elemenDate);
        var month = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"][mydate.getMonth()];
        var str = mydate.getDate() + " " + month + ' ' + mydate.getFullYear();
        $('.tgl').html(str);
        console.info(str);

    });
</script>
@endsection
