<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategori;
use Illuminate\Support\Facades\Storage;
use DB;
class bookController extends Controller
{
    public function index()
    {
    	$buku = Buku::all();
    	return view('pages.book.index', ['buku' => $buku]);	
    }

    public function create()
	{
		$kategori = Kategori::all();
		return view('pages.book.create', ['kategori' => $kategori]);
	}

	public function store(Request $request)
	{
		// $image = $request->file('gambar_buku');
		$image = $request->gambar_buku;
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('bukus'), $new_name);
		// dd($new_name_edit);
		Buku::create([
			'isbn' => $request->isbn,
			'judul_buku' => $request->judul_buku,
			'gambar_buku' => $new_name,
			'penulis' => $request->penulis,
			'penerbit' => $request->penerbit,
			'tahun_terbit' => $request->tahun_terbit,
			'id_kategori' => $request->id_kategori,
			'jumlah_halaman' => $request->jumlah_halaman,
			'sinopsis' => $request->sinopsis,
		]);

		return redirect('/book');
	}

	public function edit($id)
	{
		$kategori = Kategori::all();
		$buku = Buku::findOrFail($id);
		return view('pages.book.edit', ['buku' => $buku, 'kategori' => $kategori]);
	}

	public function update(Request $request,$id)
	{
		$gambar_buku_old = $request->gambar_buku_hidden;
		$buku = Buku::findOrFail($id);
		if ($request->gambar_buku) {
            if ($buku->images != null) {
                unlink(public_path('bukus/' . $buku->images));
            }
            $images = $request->file('gambar_buku');
            $new_name_edit = rand() . '.' . $image->getClientOriginalExtension();
    		$image->move(public_path('bukus'), $new_name);
        } else {
            $new_name_edit = $buku->gambar_buku;
        }

		$buku->update([
			'isbn' => $request->isbn,
			'judul_buku' => $request->judul_buku,
			'gambar_buku' => $new_name_edit,
			'penulis' => $request->penulis,
			'penerbit' => $request->penerbit,
			'tahun_terbit' => $request->tahun_terbit,
			'id_kategori' => $request->id_kategori,
			'jumlah_halaman' => $request->jumlah_halaman,
			'sinopsis' => $request->sinopsis,
		]); 

		return redirect('/book');
	}

	public function delete($id)
	{
		$buku = Buku::findOrFail($id);
		$buku->delete();
		return redirect('/book');
	}

	public function detail($isbn, $id)
	{
		$buku = DB::table('buku')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->select('buku.*','nama_kategori')
            ->where('buku.id' ,$id)
            ->first();
		$bukus = Buku::findOrFail($id);
            // dd($buku);
		$isbn_res = $bukus->where('isbn', $isbn)->first();
		// dd($namas['id'] != $id);
		if ($isbn_res->id != $id) {
			return redirect('/book');
		}else{
			return view('pages.book.detail', ['buku' => $buku ]);
		}
	}
}
