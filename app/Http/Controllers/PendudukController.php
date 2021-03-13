<?php

namespace App\Http\Controllers;

use App\Penduduk;
use App\Surat;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Penduduk::all();
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
     * @param  \App\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        //
        $data = Penduduk::where('nik',$nik)->get();
        \Log::info($data);
        if(!$data->isEmpty()){
            // \Log::info('hello');
            return response()->json($data);
        }
        return response()->json('NIK Tidak Ditemukan.',404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function deleteSurat($id)
    {
        //
        $surat = !empty(Surat::find($id)) ? Surat::find($id)->delete() : "surat tidak ditemukan"  ;
        
        return response()->json($surat);    
    }

    public function getSurat($id)
    {
        $data = Penduduk::find($id);
        \Log::info($data);
        $surat = !empty($data->surat()) ? $data->surat()->get() : "Belum membuat surat"; 

        return response()->json($surat);
    }

    public function getPendudukSurat()
    {
        $data = Penduduk::join('surats', 'penduduks.id', '=', 'surats.penduduks_id')
                ->select('penduduks.*', 'surats.*')
                ->get();
        return response()->json($data);
    }
}
