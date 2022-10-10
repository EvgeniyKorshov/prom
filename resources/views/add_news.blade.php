


  @include('header')
{{$title}}
<p>Название новости</p>
<form action="{{route($rout,$news->id)}}" method="post">

  @csrf
   
      <p><input type="text" size="50" name="title" value="{{$news->title}}"> </p>

      <p>Выберете категорию</p>
      <select name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$news->category_id == $category->id ? 'selected' : '' }} >
            {{$category->title}}
        </option>
        @endforeach
      </select>

     <p> Краткое описание новости</p>
      <p><input type="text" size="50" name="description" value="{{$news->description}}"> </p>
      <p>Полное описание новости</p>
      <textarea rows="15" cols="50" name="detailed_discripion">{{$news->detailed_discripion}}</textarea>
      <p><button type="submit">
      @if($news->id) Изменить @else Добавить @endif  
      </button></p>

</form>
@include('footer')
