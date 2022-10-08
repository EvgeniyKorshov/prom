@include('header')

{{-- @dd($news); --}}
@foreach ($news as $newsItem)

<p>{{$newsItem}}</p>
@endforeach
  
{{$news->title}}

@include('footer')

