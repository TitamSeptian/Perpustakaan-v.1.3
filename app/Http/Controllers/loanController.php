<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use App\Kategori;
use App\Anggota;

use DB;
class loanController extends Controller
{
    public function index()
    {
    	$peminjaman = DB::table('peminjaman')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->join('anggota', 'peminjaman.id_anggota', '=', 'anggota.id')
            ->select('peminjaman.*', 'buku.judul_buku','kategori.nama_kategori', 'anggota.nama_depan')
            ->where('status' ,'O')
            ->get();
    	return view('pages.loan.index', ['peminjaman' => $peminjaman]);
    }

    public function data_O()
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->join('anggota', 'peminjaman.id_anggota', '=', 'anggota.id')
            ->select('peminjaman.*', 'buku.judul_buku','kategori.nama_kategori', 'anggota.nama_depan')
            ->where('status' ,'O')
            ->get();
        return response()->json(['data' => $peminjaman]);;
    }

    public function create()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        return view('pages.loan.create',[
            'anggota' => $anggota,
            // 'kategori' => $kategori,
            'buku' => $buku,
        ]);
    }

    public function store(Request $request)
    {
        $lama_hari = $request->lama_hari;

        $date = date('d F Y');

        $theDate = $date;
        $timeStamp = StrToTime($theDate);
        $indays = StrToTime('+'.$lama_hari.' days', $timeStamp);
        $days = "". date('d F Y', $indays);

        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $date,
            'lama_hari' => $lama_hari,
            'tanggal_kembali' => $days,
            'status' => 'O',
        ]);

        return redirect('/loan');
    }

    public function edit($id)
    {
        $pjn = Peminjaman::findOrFail($id);

        $bk = Buku::findOrFail($pjn->id_buku);

        $agt = Anggota::findOrFail($pjn->id_anggota);

        $buku = Buku::all();
        $anggota = Anggota::all();
        // dd($anggota);
        return view('pages.loan.edit', [
            'pjn' => $pjn,
            'bk' => $bk,
            'agt' => $agt,
            'buku' => $buku,
            'anggota' => $anggota,
        ]);
    }

    public function update(Request $request,$id)
    {
        $lama_hari = $request->lama_hari;
        $date = date('d F Y');
        $theDate = $date;
        $timeStamp = StrToTime($theDate);
        $indays = StrToTime('+'.$lama_hari.' days', $timeStamp);
        $days = "". date('d F Y', $indays);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'id_buku' => $request->id_buku,
            'id_anggota' => $request->id_anggota,
            // 'id_user' => $request->id_user,
            // 'tanggal_pinjam' => $date,
            'lama_hari' => $lama_hari,
            'tanggal_kembali' => $days,
            'status' => 'O',
        ]); 

        return redirect('/loan');
    }

    public function delete($id)
    {
        $peminjaman =Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect('/loan');
    }

    public function detail($id)
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->join('anggota', 'peminjaman.id_anggota', '=', 'anggota.id')
            ->select('peminjaman.*', 'buku.*','kategori.*', 'anggota.*')
            ->where('peminjaman.id' , $id)
            ->first();
        return view('pages.loan.detail', ['pjn' => $peminjaman ]);
    }

    public function kembalikan($id)
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->join('anggota', 'peminjaman.id_anggota', '=', 'anggota.id')
            ->select('peminjaman.*', 'buku.*','kategori.*', 'anggota.*')
            ->where('peminjaman.id' , $id)
            ->first();
        return view('pages.loan.kembali_index', ['pjn' => $peminjaman, 'id' => $id]);
    }

    public function pro_kembali(Request $request, $id)
    {
        $date = date('d F Y');
        $peminjaman = Peminjaman::find($id);
        // dd($peminjaman);
        $peminjaman->update([
            'tanggal_dikembalikan' => $date,
            'lebih_hari' => $request->lebih_hari,
            'denda' => $request->denda,
            'status' => 'I',
        ]);

        return redirect('/history');
    }

    public function riwayat()
    {
        $ryt = DB::table('peminjaman')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->join('anggota', 'peminjaman.id_anggota', '=', 'anggota.id')
            ->select('peminjaman.*', 'buku.judul_buku','kategori.nama_kategori', 'anggota.nama_depan')
            ->where('status' ,'I')
            ->get();
        return view('pages.history.index', ['ryt' => $ryt]);
    }

    public function riwayat_del($id)
    {
        $ryt = Peminjaman::findOrFail($id);
        $ryt->delete();

        return redirect('/history');
    }
}
