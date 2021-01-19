<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{

    protected $fillable = ['judulBerita', 'deskripsi', 'file'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
}
