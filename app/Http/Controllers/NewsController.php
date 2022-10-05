<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Categories;
class NewsController extends Controller
{
   
    public function someMethod_too($id,News $news) {
        return view('news')->with('news', $news->getNewsId($id));
    }

    public function someMethod($id,News $news,Categories $categories) {
        return view('newsOne')
        ->with('news', $news->getNewsOneId($id))
        ->with('categories', $categories->getCategories());
    }


    public function getJson(News $news){
       
      return response()->json($news->getNews())
      ->header("Content-disposition","attachment:filename='json.txt'")
      ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
  
}   
