<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    
    // public function news($id){
    //     $news = DB::select('Select * from news where id = :id',['id'=>$id]);
    //     return view('newsOne',['news'=>$news[0]]);
    // }

    public function news(News $news){
        return view('newsOne',['news'=>$news]);
    }

    public function newsAll(){

        $news = News::query()
        ->simplePaginate(3);
        return view('newsAll',['news'=>$news]);
    }

    public function someMethod_too(Categories $categories,News $news) {
        return view('categoriesOne',[
            'categories'=>$categories,
            'news'=>News::query()->select(['id','title'])->get(),
        ]);
    }

   

    public function add_news(Request $request){
        $news = new News();

        if($request->isMethod('POST')){
            $news ->fill($request->all());
            $this->validate($request,News::rules(),[],News::attributeNames());
            $news->save();
            return redirect()->route('newsAll');
           
        }
        if(!empty($request->old())){
            $news->fill($request->old());
        }
        
        return view('add_news',[
            'news'=>$news,
            'rout'=>'add_news',
            'title'=>'Добавление новости',
            'categories'=>Categories::query()->select(['id','title'])->get(),
        ]);
    }

    public function delete_news(News $news){
       
        $news->delete();
        return redirect()->route('news');
    }

    public function update_news(Request $request,News $news){
       
        if($request->isMethod('POST')){
            $news ->fill($request->all());
            $news->save();
            return redirect()->route('newsAll');
           
        }
        
        return view('add_news',[
            'news'=>$news,
            'rout'=>'update_news',
            'title'=>'Изменение новости',
            'categories'=>Categories::query()->select(['id','title'])->get(),
        ]);
    }
}   
