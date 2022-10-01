<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

   

    public function index(){
        $news = News::getNews();
        return view('news')->with('news',$news);
    }
   
    public function sport(){
        $news = News::getNews();
        return view('sport')->with('news',$news);
    }
  
    public function politics(){
        $news = News::getNews();
        return view('politics')->with('news',$news);
    }
    public function economy(){
        $news = News::getNews();
        return view('economy')->with('news',$news);
    }
   

    public function auto(){
        $news = News::getNews();
        return view('auto')->with('news',$news);
    }
    public function science(){
        $news = News::getNews();
        return view('science')->with('news',$news);
    }
    

    public function science_1(){
        $news = News::getNews();
        return view('science/1')->with('news',$news);
    }

   
    public function science_2(){
        $news = News::getNews();
        return view('science/2')->with('news',$news);
    }

  
    public function science_3(){
        $news = News::getNews();
        return view('science/3')->with('news',$news);
    }

   

    public function science_4(){
        $news = News::getNews();
        return view('science/4')->with('news',$news);
    }


    public function science_5(){
        $news = News::getNews();
        return view('science/5')->with('news',$news);
    }

    public function sport_1(){
        $news = News::getNews();
        return view('sport/1')->with('news',$news);
    }

   

    public function sport_2(){
        $news = News::getNews();
        return view('sport/2')->with('news',$news);
    }

  
    public function sport_3(){
        $news = News::getNews();
        return view('sport/3')->with('news',$news);
    }

    
    public function sport_4(){
        $news = News::getNews();
        return view('sport/4')->with('news',$news);
    }

   
    public function sport_5(){
        $news = News::getNews();
        return view('sport/5')->with('news',$news);
    }



    public function economy_1(){
        $news = News::getNews();
        return view('economy/1')->with('news',$news);
    }


    public function economy_2(){
        $news = News::getNews();
        return view('economy/2')->with('news',$news);
    }

 

    public function economy_3(){
        $news = News::getNews();
        return view('economy/3')->with('news',$news);
    }



    public function economy_4(){
        $news = News::getNews();
        return view('economy/4')->with('news',$news);
    }

   
    public function economy_5(){
        $news = News::getNews();
        return view('economy/5')->with('news',$news);
    }

   

    public function politics_1(){
        $news = News::getNews();
        return view('politics/1')->with('news',$news);
    }

    

    public function politics_2(){
        $news = News::getNews();
        return view('politics/2')->with('news',$news);
    }

   
    public function politics_3(){
        $news = News::getNews();
        return view('politics/3')->with('news',$news);
    }

   

    public function politics_4(){
        $news = News::getNews();
        return view('politics/4')->with('news',$news);
    }

    

    public function politics_5(){
        $news = News::getNews();
        return view('politics/5')->with('news',$news);
    }

   

    public function auto_1(){
        $news = News::getNEws();
        return view('auto/1')->with('news',$news);
    }

  
    public function auto_2(){
        $news = News::getNEws();
        return view('auto/2')->with('news',$news);
    }

    

    public function auto_3(){
        $news = News::getNEws();
        return view('auto/3')->with('news',$news);
    }

    

    public function auto_4(){
        $news = News::getNEws();
        return view('auto/4')->with('news',$news);
    }


    public function auto_5(){
        $news = News::getNEws();
        return view('auto/5')->with('news',$news);
    }
}   
