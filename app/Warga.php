<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Warga extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'nama', 'alamat', 'nik', 'jenisKelamin'
    ];

    public function surat(){
        return $this->hasMany('App\Surat');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
}
