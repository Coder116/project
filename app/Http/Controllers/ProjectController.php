<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\User;


class ProjectController extends Controller
{

    public function login()
    {

        if(Auth::check()){

            return redirect()->back();
        }
        
            return view('login');
        
    }
    public function index()
    {
        return view('home');
    }

    public function loginRequest(LoginRequest $request)
    {

    	$check = Auth::attempt(['name' => $request->name, 'password' => $request->password]);

        if($check) {

            if(Auth::user()->role == 'admin'){

    		  return redirect('/');
            } else {

                return redirect()->route('user.show', Auth::id());                
            }
    	} else {

    		return redirect('login');
    	}
        
    }

    public function register()
    {
    	return view('register');
    }

    public function registerRequest(Requests\RegisterRequest $request)
    {

    }

    public function admin()
    {
    	return redirect('/');;
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }

    
}
