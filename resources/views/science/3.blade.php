@include('header')

<?php foreach ($news as $item):?>
@if ($item['id'] === 5)
<?php foreach ($item['news'] as $item_):?>
@if ($item_['id'] === 3)
<p>{{$item_['id']}}</p>
<p>{{$item_['title']}}</p>
<p>{{$item_['disc']}}</p>
@endif
<?php endforeach; ?> 
@endif
<?php endforeach; ?> 
@include('footer')