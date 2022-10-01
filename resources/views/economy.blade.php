@include('header')

<h2>Экономика</h2>


@foreach ($news as $item)
@if ($item['id'] === 2)
@foreach ($item['news'] as $item_)
    <a href="/news/categories/economy/{{ $item_['id']}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    @endforeach 
@endif
@endforeach


@include('footer')

{{route('categories.economy') .  $item_['id']}}

@foreach ($news as $item)
@if ($item['id'] === 2)
@foreach ($item['news'] as $item_)
    <a href="{{route('categories.economy',$item_['id'])}} ">{{$item_['title'] . PHP_EOL .  $item_['id']}} </a><br>
    @endforeach 
@endif
@endforeach
