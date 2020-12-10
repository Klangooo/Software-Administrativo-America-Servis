<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return view('usuario'); 
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
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('/usuario');
    }

}
