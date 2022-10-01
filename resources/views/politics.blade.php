@include('header')

    <h2>Политика</h2>
    
@foreach ($news as $item)
@if ($item['id'] === 3)
@foreach ($item['news'] as $item_)
    <a href="/news/categories/politics/{{ $item_['id']}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    @endforeach 
@endif
@endforeach
    
    @include('footer')

