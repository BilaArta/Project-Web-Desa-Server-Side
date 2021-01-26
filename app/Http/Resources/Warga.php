<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Warga extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'nik' => $this->nik,
            'role' => $this->role,
            'tanggalLahir' => $this->tanggalLahir,
            'alamat' => $this->alamat,
        ];
    }
}
