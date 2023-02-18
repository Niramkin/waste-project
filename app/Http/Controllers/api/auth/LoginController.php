<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Bridge\AccessToken;

class LoginController extends Controller
{
     public function loginUser(Request $request){

        $login = $request->validate([

            'email' => 'required|email',
            'password' => 'required|string|min:8|'

        ]);

        
        
        if(!Auth::attempt($login)){

            return response([
                'message' => 'invalid login info'
            ]);

        };

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response([

            'user' => Auth::user(),
            'accessToken' => $accessToken

        ]);

    }
}
