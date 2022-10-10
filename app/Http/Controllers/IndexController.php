<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\News;


class IndexController extends Controller
{

   

    public function index(){
       return view('index');
      

    }
   

     public function save(News $news){
        Storage::disk('local')->put('news.json', json_encode($news->getNews(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        dump(json_decode(Storage::disk('local')->get('news.json'),true));
     }
}
