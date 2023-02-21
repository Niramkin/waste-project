<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $login = $request->validate([

            'email' => 'required|email',
            'password' => 'required|string|min:8|',

        ]);

        if (! Auth::attempt($login)) {
            return response([
                'message' => 'invalid login info',
            ]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response([

            'user' => Auth::user(),
            'accessToken' => $accessToken,

        ]);
    }
}
