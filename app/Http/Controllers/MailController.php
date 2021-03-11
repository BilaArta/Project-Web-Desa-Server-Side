<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\MyTestMail;
use App\Surat;
use App\Penduduk;

class MailController extends Controller
{
    public function sendTo(Request $request)
    {
        \Log::info($request->all());
        $id = $request->input('id');
        $order = Penduduk::findOrFail($id);
        \Log::info($order);
        
        $order['deskripsi'] = $request->input('keterangan');
        $order['subjek'] = $request->input('subjek');
        $surat = new Surat([
            'subjek' => $request->input('subjek'),
            'deskripsi' => $request->input('keterangan'),
            'penduduks_id' => $id
        ]);

        $surat->save();
        Mail::to('aygail031013@gmail.com')->send(new MyTestMail($order));
        return response()->json("sukses mengirim permintaan pembuatan surat.");
    }
}
