<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\News;


class IndexController extends Controller
{

   

    public function index(){
       return view('index');
      

    }
    public function download(News $news){
    
                return response()->json($news->getNews())
                ->header("Content-type","application/txt")
                ->header("Content-disposition","attachment:filename='text.txt'")
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    
        }

     public function save(News $news){
        Storage::disk('local')->put('news.json', json_encode($news->getNews(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        dump(json_decode(Storage::disk('local')->get('news.json'),true));
     }
}
