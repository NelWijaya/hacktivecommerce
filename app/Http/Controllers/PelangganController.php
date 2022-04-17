<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

use Auth;

use App\User;


class PelangganController extends Controller
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
        $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();

        return view('layouts.pelanggan.index', $data);
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
        $store = Pelanggan::create($request->all());
        if(!$store){
            return redirect()->route('indexPelanggan')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexPelanggan')->with('success', 'Data Added Success.');
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
        $data['pelanggan'] = Pelanggan::where('id', $id)->first();

        if(!$data['pelanggan']){
            return redirect()->route('indexPelanggan')->with('error', 'Data Pelanggan Not Found.');
        }
        return view('layouts.pelanggan.edit', $data);
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
        $update = Pelanggan::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexPelanggan')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Pelanggan::find($id);
        if(!$destroy){
            return redirect()->route('indexPelanggan')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexPelanggan')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexPelanggan')->with('success', 'Data Has Been Deleted.');
    }
}
