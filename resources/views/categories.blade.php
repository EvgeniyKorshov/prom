@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Все категории</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('header')
                    @foreach ($categories as $item)
                    <p><a href="{{route("allCategoryNews",$item->id)}}">{{$item->title}}</a></p>
                    @endforeach
                    
                    @include('footer')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

