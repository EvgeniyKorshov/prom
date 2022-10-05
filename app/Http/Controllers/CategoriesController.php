<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{

   

    public function index(){
        $categories = Categories::getCategories();
        return view('categories')->with('categories',$categories);
    }
    
    
    
}   
