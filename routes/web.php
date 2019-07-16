<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/library');
});
// dashbooard
Route::get('/library', 'libraryController@index')->name('library.index');
// about
Route::get('/about', 'libraryController@about')->name('library.about');

// kategori
Route::get('/category', 'CategoryController@index')->name('category.index');

Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/respon', 'CategoryController@store')->name('category.store');

Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/category/respon/{id}', 'CategoryController@update')->name('category.update');

Route::get('/category/del/{id}', 'CategoryController@delete')->name('category.delete');
// Route::get('/categorys', 'CategoryController@index')->name('category.data');

// buku
Route::get('/book', 'bookController@index')->name('book.index');

Route::get('/book/create', 'bookController@create')->name('book.create');
Route::post('/book/respon', 'bookController@store')->name('book.store');

Route::get('/book/edit/{id}', 'bookController@edit')->name('book.edit');
Route::post('/book/respon/{id}', 'bookController@update')->name('book.update');

Route::get('/book/del/{id}', 'bookController@delete')->name('book.delete');
Route::get('/book/detail/{isbn}/{id}', 'bookController@detail')->name('book.detail');

// anggota
Route::get('/member', 'memberController@index')->name('member.index');

Route::get('/member/create', 'memberController@create')->name('member.create');
Route::post('/member/respon', 'memberController@store')->name('member.store');

Route::get('/member/edit/{id}', 'memberController@edit')->name('member.edit');
Route::put('/member/respon/{id}', 'memberController@update')->name('member.update');

Route::get('/member/del/{id}', 'memberController@delete')->name('member.delete');
Route::get('/member/detail/{nama}/{id}', 'memberController@detail')->name('member.detail');

// peminjaman
Route::get('/loan', 'loanController@index')->name('loan.index');
Route::get('/o', 'loanController@data_o')->name('data_o');

Route::get('/loan/create', 'loanController@create')->name('loan.create');
Route::post('/loan/respon', 'loanController@store')->name('loan.store');

Route::get('/loan/edit/{id}', 'loanController@edit')->name('loan.edit');
Route::put('/loan/respon/{id}', 'loanController@update')->name('loan.update');

Route::get('/loan/del/{id}', 'loanController@delete')->name('loan.delete');
Route::get('/loan/detail/{id}', 'loanController@detail')->name('loan.detail');

Route::get('/kembalikan/{id}', 'loanController@kembalikan')->name('kembali.index');
Route::put('/kembalikan/respon/{id}', 'loanController@pro_kembali')->name('kembali.pro');

// riwayat
Route::get('/history', 'loanController@riwayat')->name('kembali.riwayat');
Route::get('/history/respon/{id}', 'loanController@riwayat_del')->name('kembali.soft');
