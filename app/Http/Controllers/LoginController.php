<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
       $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required'=>'Email wajib di isi',
                'password.required'=>'Email wajib di isi',
            ]
        );
        $credential=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($credential)){
            echo"mantap";exit();
            
        }else{
            return redirect('')->withErrors('salah pw dan email')->withInput();
        }
    
    }
}
