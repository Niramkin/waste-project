<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [

            'fullname' => 'min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'mobile' => 'min:11',

        ]);

        $user = User::create([

            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->passwprd),

        ]);

        $token = $user->createToken('userToken')->accessToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }
}
