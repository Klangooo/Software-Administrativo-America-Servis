<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function funcionario()
    {
        return view('funcionario');
    }

    public function ponto()
    {
        return view('ponto');
    }

    public function usuario()
    {
        dd(Auth::check());
        if (Auth::check()) {
            return view('usuario'); 
        }
        else redirect('/login');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cadastro_usuario()
    {
        return view('cadastro_usuario');
    }

    public function cadastro_usuario_do(Request $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
