<?php

namespace App\Http\Controllers;

use App\Models\categories;

class NewsController extends Controller
{

    public function index(){
        $categories = categories::getCategories();
        return view('news')->with('categories',$categories);
    }
   
    public function sport(){
        $categories = categories::getCategories();
        return view('sport')->with('categories',$categories);
    }
    public function politics(){
        $categories = categories::getCategories();
        return view('politics')->with('categories',$categories);
    }
    public function economy(){
        $categories = categories::getCategories();
        return view('economy')->with('categories',$categories);
    }
    public function auto(){
        $categories = categories::getCategories();
        return view('auto')->with('categories',$categories);
    }
    public function science(){
        $categories = categories::getCategories();
        return view('science')->with('categories',$categories);
    }
    public function science_1(){
        $categories = categories::getCategories();
        return view('science/1')->with('categories',$categories);
    }
    public function science_2(){
        $categories = categories::getCategories();
        return view('science/2')->with('categories',$categories);
    }
    public function science_3(){
        $categories = categories::getCategories();
        return view('science/3')->with('categories',$categories);
    }
    public function science_4(){
        $categories = categories::getCategories();
        return view('science/4')->with('categories',$categories);
    }
    public function science_5(){
        $categories = categories::getCategories();
        return view('science/5')->with('categories',$categories);
    }

    public function sport_1(){
        $categories = categories::getCategories();
        return view('sport/1')->with('categories',$categories);
    }
    public function sport_2(){
        $categories = categories::getCategories();
        return view('sport/2')->with('categories',$categories);
    }
    public function sport_3(){
        $categories = categories::getCategories();
        return view('sport/3')->with('categories',$categories);
    }
    public function sport_4(){
        $categories = categories::getCategories();
        return view('sport/4')->with('categories',$categories);
    }
    public function sport_5(){
        $categories = categories::getCategories();
        return view('sport/5')->with('categories',$categories);
    }
    public function economy_1(){
        $categories = categories::getCategories();
        return view('economy/1')->with('categories',$categories);
    }
    public function economy_2(){
        $categories = categories::getCategories();
        return view('economy/2')->with('categories',$categories);
    }
    public function economy_3(){
        $categories = categories::getCategories();
        return view('economy/3')->with('categories',$categories);
    }
    public function economy_4(){
        $categories = categories::getCategories();
        return view('economy/4')->with('categories',$categories);
    }
    public function economy_5(){
        $categories = categories::getCategories();
        return view('economy/5')->with('categories',$categories);
    }
    public function politics_1(){
        $categories = categories::getCategories();
        return view('politics/1')->with('categories',$categories);
    }
    public function politics_2(){
        $categories = categories::getCategories();
        return view('politics/2')->with('categories',$categories);
    }
    public function politics_3(){
        $categories = categories::getCategories();
        return view('politics/3')->with('categories',$categories);
    }
    public function politics_4(){
        $categories = categories::getCategories();
        return view('politics/4')->with('categories',$categories);
    }
    public function politics_5(){
        $categories = categories::getCategories();
        return view('politics/5')->with('categories',$categories);
    }
    public function auto_1(){
        $categories = categories::getCategories();
        return view('auto/1')->with('categories',$categories);
    }
    public function auto_2(){
        $categories = categories::getCategories();
        return view('auto/2')->with('categories',$categories);
    }
    public function auto_3(){
        $categories = categories::getCategories();
        return view('auto/3')->with('categories',$categories);
    }
    public function auto_4(){
        $categories = categories::getCategories();
        return view('auto/4')->with('categories',$categories);
    }
    public function auto_5(){
        $categories = categories::getCategories();
        return view('auto/5')->with('categories',$categories);
    }
}   
