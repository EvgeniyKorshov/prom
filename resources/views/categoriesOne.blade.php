@include('header')
@if($news === [])
{{'Нет новостей в категории'}}
@endif
@foreach ($news as $item)
    <p>{{$item->id}}</p>
    <p>{{$item->title}}</p>
    <p>{{$item->description}}</p>
    <p>{{$item->detailed_discripion}}</p>
@endforeach
@include('footer')
