@include('header')

<h2>Авто</h2>
@foreach ($news as $item)
@if ($item['id'] === 4)
@foreach ($item['news'] as $item_)
    <a href="/news/categories/auto/{{ $item_['id']}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    @endforeach 
@endif
@endforeach

@include('footer')


  

