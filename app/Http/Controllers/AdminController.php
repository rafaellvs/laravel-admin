<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function login() {
        $email = request('email');
        $password = request('password');
        
        if(User::where('email', $email)->where('password', $password)->first()) {
            return view('admin.index');
        } else return redirect('/')->with('loginFailed', true);
    }
}
