<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes([
    'reset' => false,
    'verify' =>false,]
);

// Kategori
Route::get('/kategori/index', 'KategoriController@index')->name('indexKategori');
Route::post('/kategori/store', 'KategoriController@store')->name('storeKategori');
Route::get('/kategori/destroy/{id}', 'KategoriController@destroy')->name('destroyKategori');
Route::get('/kategori/edit/{id}', 'KategoriController@edit')->name('editKategori');
Route::post('/kategori/update/{id}', 'KategoriController@update')->name('updateKategori');

// Produk
Route::get('/product/index', 'ProductController@index')->name('indexProduct');
Route::get('/product/create', 'ProductController@create')->name('createProduct');
Route::post('/product/store', 'ProductController@store')->name('storeProduct');
Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('destroyProduct');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('editProduct');
Route::post('/product/update/{id}', 'ProductController@update')->name('updateProduct');
Route::post('/product/excel', 'ProductController@excel')->name('importData');

// Pelanggan
Route::get('/pelanggan/index', 'PelangganController@index')->name('indexPelanggan');
Route::post('/pelanggan/store', 'PelangganController@store')->name('storePelanggan');
Route::get('/pelanggan/destroy/{id}', 'PelangganController@destroy')->name('destroyPelanggan');
Route::get('/pelanggan/edit/{id}', 'PelangganController@edit')->name('editPelanggan');
Route::post('/pelanggan/update/{id}', 'PelangganController@update')->name('updatePelanggan');

// Pesanan
Route::get('/pesanan/index', 'PesananController@index')->name('indexPesanan');
Route::post('/pesanan/store', 'PesananController@store')->name('storePesanan');
Route::get('/pesanan/edit/{id}', 'PesananController@edit')->name('editPesanan');
Route::post('/pesanan/update/{id}', 'PesananController@update')->name('updatePesanan');
Route::get('/pesanan/destroy/{id}', 'PesananController@destroy')->name('destroyPesanan');

// Laporan
Route::get('/laporan/index', 'LaporanController@index')->name('indexLaporan');
Route::get('/laporan/down', 'LaporanController@getPDF')->name('downLaporan');







