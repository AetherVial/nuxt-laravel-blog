<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request) {
    //    $this->validate($request, [
    //        'email'=>'email|required|unique:users,email',
    //        'name'=>'required',
    //        'password'=>'required|min:6'
    //    ]);
       
       $user = User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password)
        ]);

        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return abort(401); //unauthorized response
        };

        return (new UserResource($request->user()))->additional([
            'meta'=>[
                'token'=> $token
            ]
        ]);
    }

    public function login(UserLoginRequest $request) {
         if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'errors' => [
                    'email' => ['Email or Password is invalid']
                ]
                ], 422); //unauthorized response
        };

        return (new UserResource($request->user()))->additional([
            'meta'=>[
                'token'=> $token
            ]
        ]);
    }

    public function user(Request $request) {
        return new UserResource($request->user());
    }

    public function logout() {
        auth()->logout();
    }
}
