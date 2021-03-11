<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'subjek', 'deskripsi' , 'penduduks_id'
    ];
    public function penduduk(){
        return $this->belongsTo(Penduduk::class, 'penduduks_id');
    }
}
