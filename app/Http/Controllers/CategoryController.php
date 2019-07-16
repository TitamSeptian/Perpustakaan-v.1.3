<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class CategoryController extends Controller
{
    public function index()
    {
    	$kategori = Kategori::all();
    	return view('pages.category.index', ['kategori' => $kategori ]);
    }

    public function create()
    {
    	return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori' => 'required|max:50',
        ]);
    	Kategori::create([
            'nama_kategori' => $request->kategori,
        ]);
    	return redirect('/category');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('pages.category.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->kategori, 
        ]);
        return redirect('/category');
    }

    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/category');        
    }
}
