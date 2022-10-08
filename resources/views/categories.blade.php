
@include('header')

<h2>Все категории</h2>
{{-- @dd($categories); --}}
@foreach ($categories as $item)
<a href=" categories/{{$item->id}} ">{{$item->title}} </a><br>
<br>
{{-- {{$item->title}} --}}
@endforeach
{{-- {{$categories->title}} --}}
@include('footer')

