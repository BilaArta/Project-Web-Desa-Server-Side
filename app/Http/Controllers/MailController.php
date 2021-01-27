<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\MyTestMail;
use App\Surat;
use App\User as Warga;

class MailController extends Controller
{
    public function sendTo(Request $request)
    {
        $order = Warga::findOrFail($request->input('id'));
        \Log::info($order);
        

        Mail::to('bilaarta@gmail.com')->send(new MyTestMail($order));
    }
}
