<?php
namespace App\Http\Controllers\NewsCotroller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AddnewsController extends Controller
{
    
    public function index(Request $request){
        if($request->isMethod('POST')){
           
            $request->flash();
            return redirect()->route('add_news');
           
        }
        if($request->old() != []){
            return response()->json($request->old())
            ->header("Content-type","application/txt")
            ->header("Content-disposition","attachment:filename='text.txt'")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            
 
        }
        dump($request->old());
        return view('add_news');
    }
   

}

