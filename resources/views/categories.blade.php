
@include('header')

<h2>Все категории</h2>
@foreach ($categories as $item)
<a href=" categories/{{$item['id']}} "> {{$item['title']}} </a><br>


@endforeach

@include('footer')

