<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class NewsController extends Controller
{
    
  

    public function news(News $news){
        return view('newsOne',['news'=>$news]);
    }

    public function newsAll(){

        $news = News::query()
        ->simplePaginate(26);
        return view('newsAll',['news'=>$news]);
    }

  
    public function someMethod_too($id) {
        $news = DB::select('Select * from news where category_id = :id',['id'=>$id]);
        return view('categoriesOne',['news'=>$news]);
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
        return redirect()->route('newsAll');
    }

    public function update_news(Request $request,News $news){
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $name = $file->hashName();
            $request->image->storeAs('images', $name);
        }
      
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
