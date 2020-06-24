<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PassportController extends Controller
{
    //composer require laravel/passport
    //php artisan migrate
    //php artisan passport:install
    //use HasApiTokens (In User Model)
    //put Passport::routes(); in AuthServiceProvider within boot
    //in config/auth.php change driver to passport

    public function register(Request $request)
    {
        $user=$request->validate([
            'name' => "required",
            'email' => 'required',
            'password'  =>  "required|confirmed"
        ]);

        $user['password']=bcrypt($request->password);
        $accessToken=$user->createToken('authToken')->accessToken;

        $user=User::create($user);
        return response(['user'=>$user,'access_token'=>$accessToken]);
    }

    public function login()
    {
        $user=request()->validate([
            'name' => 'required',
            'password'  =>  "required"
        ]);

        if(!auth()->attempt($user))
            return response(['message'=>'Invalid credentails']);
        $accessToken=auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(),'access_token'=>$accessToken]);
    }

    public function test()
    {
        return "Hi";
    }
}
