<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as User;

class LoginController extends Controller
{
    public function loginGit(){
        return Socialite::driver('github')->redirect();
    }
    public function responseGit(){

        
        $socialLiteUser = Socialite::driver('github')->user();

        $user =  User::where([
            'provider'=>'github',
            'provider_id'=> $socialLiteUser->getId(),
        ])->first();

            if(!$user){
                $user =  User::create([
                    'name'=>$socialLiteUser->getNickname(),
                    'email'=> $socialLiteUser->getEmail(),
                    'provider'=>'github',
                    'provider_id'=> $socialLiteUser->getId(),
                    'email_verified_at'=>now(),
                ]);
            }
Auth::login($user);
return redirect('/');
        dd($user);
        // dump($user->getNickname(),$user->getEmail(),$user->getId(),$user->getAvatar());
    }
}
