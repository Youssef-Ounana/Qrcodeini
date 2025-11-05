<?php

namespace App\Http\Controllers;


use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /** 
     * Show registration form
     */
    public function showRegistrationForm(){
        return view('user.register');
    }

    /**
     * Store new user 
     */
    public function store(StoreUserRequest $request){
        User::create($request->validated());
        return to_route('login')->with('success','acc created');
    }


    /** 
     * Show login form
     */
    public function showLoginForm(){
        return view('user.login');
    }
    

    /**
     * Login / logout
     */
    public function login(AuthUserRequest $request){
        if (auth()->attempt($request->validated())){
            return to_route('qrcodes.index');
        }
        return back()->withErrors('email', 'we dont have this email');
    }

    public function logout(){
        auth()->logout();
        return to_route('login');
    }

    
}
