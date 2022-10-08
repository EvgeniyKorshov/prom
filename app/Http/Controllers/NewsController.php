<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    
    public function news($id){
        $news = DB::select('Select * from news where id = :id',['id'=>$id]);
        return view('newsOne',['news'=>$news[0]]);
    }
    public function someMethod_too($id,News $news) {
        return view('news')->with('news', $news->getNewsId($id));
    }

   

    public function getJson(News $news){
       
      return response()->json($news->getNews())
      ->header("Content-disposition","attachment:filename='json.txt'")
      ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
  
}   
