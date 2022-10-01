@include('header')

<h2>Наука</h2>

@foreach ($news as $item)
@if ($item['id'] === 5)
@foreach ($item['news'] as $item_)
    <a href="/news/categories/science/{{ $item_['id']}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    @endforeach 
@endif
@endforeach

@include('footer')

