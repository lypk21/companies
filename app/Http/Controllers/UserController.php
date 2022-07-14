<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(UserLoginRequest $request) {
        if(Auth::attempt($request->only(['email','password']))) {
            return response()->redirectTo('/admin/company');
        } else {
            return back()->with('error','email or password wrong');
        }
    }

    public function logout() {
        Auth::logout();
        return response()->redirectTo('/');
    }
}
