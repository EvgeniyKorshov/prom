<?php
namespace App\Http\Controllers\NewsCotroller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AddNewsController extends Controller
{
    
    public function index(Request $request){
        if($request->isMethod('POST')){
           
            $request->flash();
            return redirect()->route('add_news');
           
        }
        
        return view('add_news');
    }
   

}

