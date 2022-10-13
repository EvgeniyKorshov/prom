


  @include('header')
{{$title}}

<form action="{{route($rout,$news->id)}}" method="post">

  @csrf

  @if($errors->has('title'))
  @foreach($errors->get('title') as $error)
  <p style="margin-bottom: 0;border:1px solid black;">{{ $error }}</p>
  @endforeach
  @endif

  <p>Название новости</p>
      <p><input type="text" size="50" name="title" value="{{$news->title}}"> </p>

     
        
      <p>Выберете категорию</p>
      <select name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$news->category_id == $category->id ? 'selected' : '' }} >
            {{$category->title}}
        </option>
        @endforeach
      </select>

      @if($errors->has('description'))
      @foreach($errors->get('description') as $error)
      <p style="margin-bottom: 0;border:1px solid black;">{{ $error }}</p>
      @endforeach
      @endif

     <p> Краткое описание новости</p>
      <p><input type="text" size="50" name="description" value="{{$news->description}}"> </p>

      @if($errors->has('detailed_discripion'))
      @foreach($errors->get('detailed_discripion') as $error)
      <p style="margin-bottom: 0;border:1px solid black; ">{{ $error }}</p>
      @endforeach
      @endif

      <p>Полное описание новости</p>
      <textarea rows="15" cols="50" name="detailed_discripion">{{$news->detailed_discripion}}</textarea>
      <p><button type="submit">
      @if($news->id) Изменить @else Добавить @endif  
      </button></p>

</form>
@include('footer')

