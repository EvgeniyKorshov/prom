@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Главная</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('header')
                    <div class="container mt-5">
                        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                          <h3 class="text-center mb-5">Загрузить файл в Laravel</h3>
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                          @endif
                          @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="chooseFile" >
                                <label class="custom-file-label" for="chooseFile">Выберите файл</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Загрузка файлов
                            </button>
                        </form>
                    </div>
                    
                    @include('footer')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

