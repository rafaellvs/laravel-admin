<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function login() {
        $email = request('email');
        $password = request('password');
        $loginFailed = true;

        if(User::where('email', $email)->where('password', $password)->first()) {
            return view('admin.index');
        }
        else return view('front.index', ['loginFailed' => $loginFailed]);
    }
}
