<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Exports\ExportProduct;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;
use App\Models\Kategori;
use Auth;
use Illuminate\Support\Str;


class ProductController extends Controller
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
        $data['product'] = Product::join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*','kategori.nama_kategori')
            ->get();
        // dd($data['product']);
        return view('layouts.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['usr'] = User::where('id', Auth::id())->first();
        $data['kategori'] = Kategori::orderBy('created_at', 'DESC')->get();

        // dd($data['kategori']);
        return view('layouts.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->foto_produk){
            $photo = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('produk', $namafile);
        }

        $store = Product::create(array_merge($request->all(), ['foto_produk' => $namafile]));
        if(!$store){
            return redirect()->route('indexProduct')->with('error', 'Data Added Failed.');
        } else {
            return redirect()->route('indexProduct')->with('success', 'Data Added successfully.');
        }
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
        $data['edit'] = Product::join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*','kategori.nama_kategori')
            ->find($id);

        $data['kategori'] = Kategori::orderBy('created_at', 'DESC')->get();

        $data['usr'] = User::where('id', Auth::id())->first();

        if(!$data['edit']){
            return redirect()->route('indexProduct')->with('error', 'Data Product Not Found.');
        }

        return view('layouts.product.edit', $data);
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
        $update = Product::find($id);

        if(!$update){
            return redirect()->back()->with('error', 'Data Not Found!.');
        }

        if($request->hasFile('photo')){
            $path = 'produk/'.$update->photo;
            if(File::exists($path)){
                File::delete($path);
            }

            $photo = $request->photo;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('produk', $namafile);
        } else {
            $namafile = $update->photo;
        }

        $update = Product::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexProduct')->with('success', 'Data Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Product::find($id);
        if(!$destroy){
            return redirect()->route('indexProduct')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexProduct')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexProduct')->with('success', 'Data Has Been Deleted.');

    }

    public function excel(Request $request){
        // dd($request->all());
        $request->validate([
            'import_file' => 'required',
        ]);
        // $path = $request->file('import_file')->getRealPath();
        Excel::import(new ImportProduct, request()->file('import_file'));
        return back()->with('success', 'Product imported successfully.');
    }


}
