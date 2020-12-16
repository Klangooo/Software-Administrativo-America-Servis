<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ponto;
use App\Funcionario;

class PontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontos = Ponto::all();
        return view('ponto')->with('pontos', $pontos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $erro = NULL;
        $cpf = $request->input('cpf');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $funcionario = DB::table('funcionarios')->where('cpf', $cpf)->first();
        $ASlatitude = floatval($funcionario->latitude);
        $ASlongitude = floatval($funcionario->longitude);
        $VARlatitude = abs($latitude - $ASlatitude);
        $VARlongitude = abs($longitude - $ASlongitude);
        if (DB::table('funcionarios')->where('cpf', $cpf)->count() == 0)
        {
            return redirect('/funcionarios');
            //erro de cpf
        }
        else if($VARlatitude < 0.008993 && $VARlongitude < 0.008993)
        {
            // Create Post
            $ponto = new Ponto;
            $ponto->nome = $funcionario->nome;
            $ponto->cargo = $funcionario->cargo;
            $ponto->postodeservico = $funcionario->postodeservico;

            $ponto->entrada = $request->input('entrada');
            $ponto->iniciointervalo = $request->input('iniciointervalo');
            $ponto->fimintervalo = $request->input('fimintervalo');
            $ponto->saida = $request->input('saida');

            //$funcionario->id = auth()->user()->id;
            //$funcionario->cover_image = $fileNameToStore;
            
            $ponto->save();
            return redirect('/ponto');
        }
        else
        {
            return redirect('/funcionarios');
            //erro de localização
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*                public function edit($id)
                    {
                        $funcionario = Funcionario::find($id);
                        return view('funcionarios')->with('funcionario', $funcionario);
                    }
    */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*                public function update(Request $request, $id)
                    {
                        $funcionario = Funcionario::find($id);
                        // Update Post
                        $funcionario->nome = $request->input('nome');
                        $funcionario->cpf = $request->input('cpf');
                        $funcionario->cargo = $request->input('cargo');
                        $funcionario->postodeservico = $request->input('postodeservico');

                        $funcionario->save();
                        return redirect('/funcionarios');
                    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ponto = Ponto::find($id);
        $ponto->delete();
        return redirect('/ponto');
    }

    /**
     * Remove all resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyALL()
    {
        Ponto::truncate();
        return redirect('/ponto');
    } 

}

