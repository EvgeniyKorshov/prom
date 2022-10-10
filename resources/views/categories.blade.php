
@include('header')

<h2>Все категории</h2>
@foreach ($categories as $item)
<p>{{$item->id . PHP_EOL .  $item->title}}</p>
@endforeach

@include('footer')

