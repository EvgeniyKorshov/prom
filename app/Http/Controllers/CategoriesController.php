<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

   

    public function index(){
        $categories = DB::select('Select * from categories');
        return view('categories',['categories'=>$categories]);
    }
    public function categories($id){
        $categories = DB::select('Select * from categories where id = :id',['id'=>$id]);
        return view('categories',['categories'=>$categories[0]]);
    }
    
}   
