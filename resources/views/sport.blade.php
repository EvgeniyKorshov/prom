@include('header')

<h2>Спорт</h2>
@foreach ($news as $item)
@if ($item['id'] === 1)
@foreach ($item['news'] as $item_)
    <a href="/news/categories/sport/{{ $item_['id']}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    
    @endforeach 
@endif
@endforeach
@include('footer')
