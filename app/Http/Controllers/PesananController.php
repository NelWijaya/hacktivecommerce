<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Pelanggan;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\User;
use Auth;


class PesananController extends Controller
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

        return view('layouts.pesanan.index', $data);
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
        $today = Carbon::now('GMT+7');

        // dd($today->day);

        $invoice = $today->year. '/' . $today->month . '/' . $today->day . '/' . random_int(0, 999999);
        $data['produk'] = Product::find($request["produk_id"]);
        $date = date("Y-m-d");
        $harga = $data['produk']->harga * $request->qty;

        // dd($request->all());

        $dataStore = array_merge($request->all(), ["invoice_id"=>$invoice, "total_harga"=>$harga, "date"=>$date]);
        $store = Pesanan::create($dataStore);
        if(!$store){
            return redirect()->route('indexPesanan')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexPesanan')->with('success', 'Data Added Success.');
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
        $data['edit'] = Pesanan::join('produk', 'pesanan.produk_id', '=', 'produk.id')
            ->join('pelanggan', 'pesanan.pelanggan_id', '=', 'pelanggan.id')
            ->select('pesanan.*','produk.nama_produk', 'produk.harga','pelanggan.name')
            ->find($id);
        $data['produk'] = Product::get();
        $data['pelanggan'] = Pelanggan::get();

        $data['usr'] = User::where('id', Auth::id())->first();

        if(!$data['edit']){
            return redirect()->route('indexProduct')->with('error', 'Data Product Not Found.');
        }

        return view('layouts.pesanan.edit', $data);
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
        // dd($request->all());

        $data['produk'] = Product::find($request["produk_id"]);
        $harga = $data['produk']->harga * $request->qty;

        // dd($request->all());

        $dataStore = array_merge($request->all(), ["total_harga"=>$harga]);
        $update = Pesanan::updateOrCreate(['id'=>$id], $dataStore);
        if(!$update){
            return redirect()->route('indexPesanan')->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexPesanan')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Pesanan::find($id);
        if(!$destroy){
            return redirect()->route('indexPesanan')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexPesanan')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexPesanan')->with('success', 'Data Has Been Deleted.');
    }
}
