@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новости</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('header')
                                                
                        <ul>
                            <li><a href="{{route("add_news")}}">Добавить новость</a></li>
                        </ul>
                      
                        @foreach ($news as $item)
                        <hr>
                        
                        <p><a href="{{route("newsOne",$item->id)}}">{{$item->title}}</a></p>
                        <p>{{$item->description}}</p>
                        <p>{!! $item->detailed_discripion !!}</p>
                        <ul>
                            <li><a href="{{route("delete_news",$item->id)}}">Удалить новость</a></li>
                            <li><a href="{{route("update_news",$item->id)}}">Обновить новость</a></li>
                        </ul>

                        @endforeach 


                        <nav class="page-navigation">
                            {{$news->links()}} 
                            </nav>
                    
                    @include('footer')
                </div>
            </div>
        </div>
    </div>
</div>
<style>
      img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 500px;
}
</style>
@endsection

