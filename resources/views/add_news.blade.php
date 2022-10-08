


  @include('header')

Укажите название новости
<form action="/add_news" method="post">
  @csrf
  <p><input type="text" size="50" name="title" value="{{old('title') }}"> </p>
  Укажите краткое описание новости
  <p><input type="text" size="50" name="discription" value="{{old('discription') }}"> </p>
  <textarea rows="15" cols="50" name="detailed_discripion">{{old('detailed_discripion') }}</textarea>
<p><input type="submit" value="Добавить новость"></p>
</form>
@include('footer')
