<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    
    protected $table = "categories";

    public function news(){
      return $this->belongsToMany(News::class, 'news_categories'); 
    }
}
