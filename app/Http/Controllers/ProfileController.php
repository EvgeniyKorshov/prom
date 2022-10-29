<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   
    public function update ( Request $request){
       
        $user = Auth::user();
        
        if($request->isMethod('POST'))
        { 
            $this->validate($request,$this->validateRules(),[],$this->attributesNames());
            
            $errors['password'][]='Неверно введен текущий пароль';

                if(Hash::check($request->post('password'),$user->password) )
                {
                   
                    $user->fill([
                        'is_admin'=>$request->post('is_admin'),
                        'name'=>$request->post('name'),
                        'description'=>Hash::make($request->post('newPassword')),
                        'email'=>$request->post('email'),
                        
                      
                    ]);
                    $user->save();
                    $request->session()->flash('MSG','Данные сохранены');
                    $errors = [];
                }
        return redirect()->route('updateProfile')->withErrors($errors);
    }
    return view('profile',['user'=>$user]);
}

    protected function validateRules(){

    return [
        'name'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users,email',
        'password'=>'required',
        'newPassword'=>'required|string|min:8',
        'is_admin'=>'boolean',
    ];

    }
    protected function attributesNames(){

    return [
        'newPassword'=>'Новый пароль',
         'is_admin'=>'Админ',
    ];

    }
}