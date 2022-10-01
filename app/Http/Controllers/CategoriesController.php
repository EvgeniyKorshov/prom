<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{

    public function index(){
        $categories = Categories::getCategories();
        return view('news')->with('categories',$categories);
    }
   
    public function sport(){
        $categories = Categories::getCategories();
        return view('sport')->with('categories',$categories);
    }
    public function politics(){
        $categories = Categories::getCategories();
        return view('politics')->with('categories',$categories);
    }
    public function economy(){
        $categories = Categories::getCategories();
        return view('economy')->with('categories',$categories);
    }
    public function auto(){
        $categories = Categories::getCategories();
        return view('auto')->with('categories',$categories);
    }
    public function science(){
        $categories = Categories::getCategories();
        return view('science')->with('categories',$categories);
    }
    
}   
