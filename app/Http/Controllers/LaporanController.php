<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\User;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Auth;
use PDF;


class LaporanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['usr'] = User::where('id', Auth::id())->first();
        $data['pesanan'] = Pesanan::join('produk', 'pesanan.produk_id', '=', 'produk.id')
            ->join('pelanggan', 'pesanan.pelanggan_id', '=', 'pelanggan.id')
            ->select('pesanan.*','produk.nama_produk','pelanggan.name')
            ->get();
        $data['produk'] = Product::get();
        $data['pelanggan'] = Pelanggan::get();

        return view('layouts.laporan.index', $data);
    }

    public function getPDF(){
        $pesanan = Pesanan::join('produk', 'pesanan.produk_id', '=', 'produk.id')
            ->join('pelanggan', 'pesanan.pelanggan_id', '=', 'pelanggan.id')
            ->select('pesanan.*','produk.nama_produk','pelanggan.name')
            ->get();
        $data['produk'] = Product::get();
        $data['pelanggan'] = Pelanggan::get();

        $pdf = PDF::loadView('layouts.laporan.pdf', compact('pesanan'));
        return $pdf->download('list-pembelian.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
