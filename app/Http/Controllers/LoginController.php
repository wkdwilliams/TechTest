<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function login(Request $request){
        return $this->render('login', ['error' => $request->get('err')]);
    }

    public function authenticate(Request $request){
        $email    = $request->input('email');
        $password = $request->input('password');

       $result = User::select(['email', 'password'])->where([
            ['email', '=', $email],
            ['password', '=', $password]
        ])->get();

       if($result->count() === 0){
           return Redirect::to('/th/member/login?err=1');
        }

        $request->session()->put('user', $result->toArray()[0]['email']);
        return Redirect::to('/th');

    }

    public function logout(Request $request){
        $request->session()->forget('email');
        $request->session()->flush();

        return Redirect::to('/th');
    }

}
