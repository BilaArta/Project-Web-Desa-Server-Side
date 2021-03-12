<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{

    protected $fillable = ['judulBerita', 'deskripsi', 'file', 'created_by'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
    
    public function created_by(){
        return $this->belongsTo(User::class, 'id');
    }
}
