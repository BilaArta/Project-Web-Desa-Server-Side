<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;


class NewsController extends Controller
{
    public $jenis;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
                    ->join('categories', 'categories.id', '=', 'news_categories.category_id')
                    ->select('news.id', 'deskripsi', 'judulBerita as judul', 'file', 'news.created_at as created_at', 'categories.name as jenis')
                    ->paginate(5);            
            // $news = News::paginate(5);
        
        return response($news, 200);
    }


    public function searchBerita(Request $request){
        \Log::info($request->all());
        if($request->has('jenis') & $request->has('desc')) {
            $this->jenis = $request->input('jenis');
            
            $news = News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
                        ->join('categories', 'categories.id', '=', 'news_categories.category_id')
                        ->select('news.id', 'deskripsi', 'judulBerita as judul', 'file', 'news.created_at as created_at', 'categories.name as jenis')
                        ->whereHas('categories', function($val) {
                            $val->where('categories.name', '=', $this->jenis);
            })->orderBy('created_at', 'desc')->paginate(5);
            
            return $news;

        }elseif ($request->has('jenis')) {
            $this->jenis = $request->input('jenis');
            \Log::info($this->jenis);
            $news = News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
                        ->join('categories', 'categories.id', '=', 'news_categories.category_id')
                        ->select('news.id', 'deskripsi', 'judulBerita as judul', 'file', 'news.created_at as created_at', 'categories.name as jenis')
                        ->whereHas('categories', function($val) {
                            $val->where('categories.name', '=', $this->jenis);
            })->paginate(5);
            
            return $news;

        }elseif ($request->has('desc')) {
            // \Log::info("sorting desc");
            $news = News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
                        ->join('categories', 'categories.id', '=', 'news_categories.category_id')
                        ->select('news.id', 'deskripsi', 'judulBerita as judul', 'file', 'news.created_at as created_at', 'categories.name as jenis')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
            return $news;
        }
        return response($news, 200);
    }
    
     /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return News::join('news_categories', 'news.id', '=', 'news_categories.news_id')
                    ->join('categories', 'categories.id', '=', 'news_categories.category_id')
                    ->select('news.id', 'deskripsi', 'judulBerita as judul','created_by', 'file', 'news.created_at as created_at', 'categories.name as jenis')
                    ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }
}
