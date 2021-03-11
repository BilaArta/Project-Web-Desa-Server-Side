<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'subjek', 'deskripsi', 'warga_id'
    ];
    public function warga(){
        return $this->belongsTo('App\User');
    }
}
