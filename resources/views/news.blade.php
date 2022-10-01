@include('header')

<h2>Категории новостей</h2>

@foreach ($categories as $item)
<a href=" /news/categories/{{$item['id']}} "> {{$item['title']}} </a><br>


@endforeach

@include('footer')
