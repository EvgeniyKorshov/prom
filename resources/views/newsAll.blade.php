

@include('header')

<h2>Новости</h2>

<ul>
    <li><a href="{{route("add_news")}}">Добавить новость</a></li>
</ul>

@foreach ($news as $item)
<hr>
<p>{{$item->title}}</p>
<p>{{$item->description}}</p>
<p>{{$item->detailed_discripion}}</p>
<ul>
    <li><a href="{{route("delete_news",$item->id)}}">Удалить новость</a></li>
    <li><a href="{{route("update_news",$item->id)}}">Обновить новость</a></li>
</ul>

@endforeach 


<nav class="page-navigation">
    {{$news->links()}} 
    </nav>
@include('footer')
