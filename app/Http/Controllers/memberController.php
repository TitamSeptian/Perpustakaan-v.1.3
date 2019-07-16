<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;

class memberController extends Controller
{
	public function index()
	{
    	$member = Anggota::all();
	    return view('pages.member.index', ['anggota' => $member ]);	
	}

	public function create()
	{
		return view('pages.member.create');
	}

	public function store(Request $request)
	{
		Anggota::create([
			'nisn' => $request->nisn,
			'nama_depan' => $request->nama_depan,
			'nama_belakang' => $request->nama_belakang,
			'kelas' => $request->kelas,
			'jurusan' => $request->jurusan,
		]);

		return redirect('/member');
	}

	public function edit($id)
	{
		$anggota = Anggota::findOrFail($id);
		return view('pages.member.edit', ['anggota' => $anggota]);
	}

	public function update(Request $request,$id)
	{
		$anggota = Anggota::findOrFail($id);
		$anggota->update([
			'nisn' => $request->nisn,
			'nama_depan' => $request->nama_depan,
			'nama_belakang' => $request->nama_belakang,
			'kelas' => $request->kelas,
			'jurusan' => $request->jurusan,
		]); 

		return redirect('/member');
	}

	public function delete($id)
	{
		$anggota = Anggota::findOrFail($id);
		$anggota->delete();
		return redirect('/member');
	}

	public function detail($nama, $id)
	{
		$anggota = Anggota::findOrFail($id);
		$namas = $anggota->where('nama_depan', $nama)->first();
		// dd($namas['id'] != $id);
		if ($namas['id'] != $id) {
			return redirect('/member');
		}else{
			return view('pages.member.detail', ['anggota' => $anggota ]);
		}
	}
}
