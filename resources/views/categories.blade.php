
@include('header')

<h2>Все категории</h2>
@foreach ($categories as $item)
<p><a href="{{route("allCategoryNews",$item->id)}}">{{$item->title}}</a></p>
@endforeach

@include('footer')

