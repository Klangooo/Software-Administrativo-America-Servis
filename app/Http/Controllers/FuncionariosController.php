<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
//use DB;
use App\Funcionario;
use App\Ponto;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios')->with('funcionarios', $funcionarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create Post
        $funcionario = new Funcionario;
        $funcionario->nome = $request->input('nome');
        $funcionario->cpf = $request->input('cpf');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->postodeservico = $request->input('postodeservico');
        $funcionario->latitude = $request->input('latitude');
        $funcionario->longitude = $request->input('longitude');
        $funcionario->save();
        return redirect('/funcionarios');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionarios')->with('funcionario', $funcionario);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        // Update Post
        $funcionario->nome = $request->input('nome');
        $funcionario->cpf = $request->input('cpf');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->postodeservico = $request->input('postodeservico');
        $funcionario->latitude = $request->input('latitude');
        $funcionario->longitude = $request->input('longitude');
        $funcionario->save();
        return redirect('/funcionarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $pontos = Ponto::where('cpf', '=', $funcionario->cpf);
        $funcionario->delete();
        if($pontos){$pontos->delete();}
        return redirect('/funcionarios');
    }    

}

