<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'subjek', 'deskripsi'
    ];
    public function warga(){
        return $this->belongsTo('App\Warga');
    }
}
