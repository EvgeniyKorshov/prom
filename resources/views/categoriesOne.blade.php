@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Конкретная новость</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('header')
                    @if($news === [])
                    {{'Нет новостей в категории'}}
                    @endif
                    @foreach ($news as $item)
                        <p>{{$item->id}}</p>
                        <p>{{$item->title}}</p>
                        <p>{{$item->description}}</p>
                        <p>{{$item->detailed_discripion}}</p>
                    @endforeach
                    
                    @include('footer')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

