<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Kategori;
use Auth;

use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $data['kategori'] = Kategori::orderBy('created_at', 'DESC')->get();
        // dd($data['kategori']);
        return view('layouts.kategori.kategori', $data);
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
        // dd($request->all());
        $store = Kategori::create($request->all());
        if(!$store){
            return redirect()->route('indexKategori')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexKategori')->with('success', 'Data Added Success.');
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
        $data['usr'] = User::where('id', Auth::id())->first();
        $data['kategori'] = Kategori::where('id', $id)->first();

        if(!$data['kategori']){
            return redirect()->route('indexKategori')->with('error', 'Data Kategori Not Found.');
        }
        return view('layouts.kategori.edit', $data);

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
        $update = Kategori::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexKategori')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        $destroy = Kategori::find($id);
        if(!$destroy){
            return redirect()->route('indexKategori')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexKategori')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexKategori')->with('success', 'Data Has Been Deleted.');

    }
}
