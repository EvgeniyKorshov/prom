@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Изменение учетных данных</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('header')
                                                
                        <form action="{{route('updateProfile')}}" method="POST">
                          
                          @csrf

                          @if(Session::has('MSG'))
                          <p style="margin-bottom: 0;border:1px solid black;">{{Session::get('MSG') }}</p>
                        
                          @endif

                          @if($errors->has('name'))
                          @foreach($errors->get('name') as $error)
                          <p style="margin-bottom: 0;border:1px solid black;">{{ $error }}</p>
                          @endforeach
                          @endif

                              <p><input  size="50" type="text" name="name" value="{{$user->name}}"> </p>

                              @if($errors->has('email'))
                              @foreach($errors->get('email') as $error)
                              <p style="margin-bottom: 0;border:1px solid black;">{{ $error }}</p>
                              @endforeach
                              @endif

                              <p><input size="50" name="email"  type="email" value="{{$user->email}}"> </p>

                              @if($errors->has('password'))

                              @foreach($errors->get('password') as $error)
                              <p style="margin-bottom: 0;border:1px solid black;">{{ $error }}</p>
                              @endforeach
                              @endif

                              <p><input size="50" name="password" type="password" placeholder="Пароль"> </p>
                            

                              @if($errors->has('newPassword'))
                              @foreach($errors->get('newPassword') as $error)
                              <p style="margin-bottom: 0;border:1px solid black; ">{{ $error }}</p>
                              @endforeach
                              @endif

                              <p><input  size="50" name="newPassword" type="password" placeholder="Новый пароль"> </p>

                              @if($errors->has('is_admin'))
                              @foreach($errors->get('is_admin') as $error)
                              <p style="margin-bottom: 0;border:1px solid black; ">{{ $error }}</p>
                              @endforeach
                              @endif
                              @if($user->is_admin === 1)
                              <p><input type="number" size="50" name="is_admin"  value="{{$user->is_admin}}"  ></p>
                              @endif
                            


                              <p><button type="submit">Изменить </button></p>
                              

                        </form>
                    
                    @include('footer')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


  