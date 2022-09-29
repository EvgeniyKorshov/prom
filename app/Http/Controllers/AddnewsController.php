<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddnewsController extends Controller
{
    public function index(){
        return view('add_news');
    }
}
