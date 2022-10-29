@include('header')

<h2>Все новости</h2>


@foreach ($news['news'] as $item_)

<a href=" /news/{{$item_['id']}} "> {{$item_['title']}} </a><br>


@endforeach 

@include('footer')

