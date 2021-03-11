<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //

    protected $fillable = [
        'nama', 'nik', 'tanggalLahir', 'gender', 'alamat'
    ];

    public function surat(){
        return $this->hasMany(Surat::class, 'penduduks_id');
    }
}
