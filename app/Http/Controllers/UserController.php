<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Пользователь создан');

    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            if(Auth::user()->is_admin){
                return redirect()->route('index.index')->with('success', 'Здравствуйте Администратор, вы в панели управления');
            }else {
                return redirect()->route('home')->with('success', 'Добро пожаловать на сайт');
            }
        }
        return redirect()->back()->with('error', 'Некорректные мыло или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Уже уходите?');
    }
}
