<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Kategori;
use App\Models\Product;
use Carbon\Carbon;
use App\User;
use Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now('GMT+7')->toDateString();
        $data['usr'] = User::where('id', Auth::id())->first();
        $data['omset'] =Pesanan::where('status', 'Selesai')->sum('total_harga');
        $data['pesanan_baru'] =Pesanan::where('status', 'Proses')->where('date', $today)->count();
        $data['pesanan_proses'] =Pesanan::where('status', 'Proses')->count();
        $data['pesanan_batal'] =Pesanan::where('status', 'Batal')->count();
        $data['pesanan_selesai'] =Pesanan::where('status', 'Selesai')->count();
        $data['customer'] =Pelanggan::count();
        $data['kategori'] =Kategori::count();
        $data['product'] =Product::count();

        return view('home', $data);
    }
}
