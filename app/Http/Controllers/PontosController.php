<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ponto;
use App\Funcionario;

use Illuminate\Http\Response;

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
        if (!$funcionario)
        {
            return redirect('/funcionarios');
            //erro de cpf
        }
        else
        {
            $ASlatitude = floatval($funcionario->latitude);
            $ASlongitude = floatval($funcionario->longitude);
            $VARlatitude = abs($latitude - $ASlatitude);
            $VARlongitude = abs($longitude - $ASlongitude);

            // Create Post
            $ponto = new Ponto;
            $ponto->nome = $funcionario->nome;
            $ponto->cargo = $funcionario->cargo;
            $ponto->postodeservico = $funcionario->postodeservico;

            if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                $ponto->verificacao = '1';
            } else {
                $ponto->verificacao = '0';
            }

            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
            date_default_timezone_set('America/Sao_Paulo');
            $ponto->entrada = date('H:i:s', time());
            
            $ponto->iniciointervalo = $request->input('iniciointervalo');
            $ponto->fimintervalo = $request->input('fimintervalo');
            $ponto->saida = $request->input('saida');

            // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÁRIO DEFINIDO (BRASÍLIA)
            // $dataLocal = date('d/m/Y H:i:s', time());
            $ponto->data = date('d/m/Y', time());
            
            $ponto->save();
            return redirect('/ponto');
        }
    }


    public function storeApp(Request $request)
    {
        $erro = NULL;
        $cpf = $request->cpf;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $funcionario = DB::table('funcionarios')->where('cpf', $cpf)->first();
        
        if (!$funcionario)
        {
            return response('Funcionario não existente', 400)
                    ->header('Content-Type', 'application/json');
            //erro de cpf
        }
        else
        {
            $ASlatitude = floatval($funcionario->latitude);
            $ASlongitude = floatval($funcionario->longitude);
            $VARlatitude = abs($latitude - $ASlatitude);
            $VARlongitude = abs($longitude - $ASlongitude);

            // Create Post
            $ponto = new Ponto;
            $ponto->nome = $funcionario->nome;
            $ponto->cargo = $funcionario->cargo;
            $ponto->postodeservico = $funcionario->postodeservico;

            if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                $ponto->verificacao = '1';
            } else {
                $ponto->verificacao = '0';
            }

            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
            date_default_timezone_set('America/Sao_Paulo');
            $ponto->entrada = $request->entrada; // date('H:i:s', time());
            
            $ponto->iniciointervalo = $request->almoco;
            $ponto->fimintervalo = $request->fim;
            $ponto->saida = $request->saida;

            // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÁRIO DEFINIDO (BRASÍLIA)
            // $dataLocal = date('d/m/Y H:i:s', time());
            $ponto->data = date('d/m/Y', time());
            
            $ponto->save();
            return response($ponto,200)
                    ->header('Content-Type', 'application/json');
           // return redirect('/ponto');
        }
    }





    public function storeApp2(Request $request)
    {
        $erro = NULL;
        $cpf = $request->cpf;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $funcionario = DB::table('funcionarios')->where('cpf', $cpf)->first();
        
        if (!$funcionario)
        {
            return response('Funcionario não existente', 400)
                    ->header('Content-Type', 'application/json');
            //erro de cpf
        }
        else
        {
            $ASlatitude = floatval($funcionario->latitude);
            $ASlongitude = floatval($funcionario->longitude);
            $VARlatitude = abs($latitude - $ASlatitude);
            $VARlongitude = abs($longitude - $ASlongitude);

            date_default_timezone_set('America/Sao_Paulo');

            $pontoAtual = DB::table('pontos')->where('data', date('d/m/Y'), time())->first();
            
            if($pontoAtual)
            {
                $ponto = Ponto::find($pontoAtual->id);
                // Update Post
                if($request->almoco) $ponto->iniciointervalo = $request->almoco;
                if($request->fim) $ponto->fimintervalo = $request->fim;
                if($request->saida) $ponto->saida = $request->saida;

                $ponto->save();
                return response()->json($ponto)
                    ->header('Content-Type', 'application/json');
            }

            // Create Post
            $ponto = new Ponto;
            $ponto->nome = $funcionario->nome;
            $ponto->cargo = $funcionario->cargo;
            $ponto->postodeservico = $funcionario->postodeservico;

            if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                $ponto->verificacao = '1';
            } else {
                $ponto->verificacao = '0';
            }

            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
            $ponto->entrada = $request->entrada; // date('H:i:s', time());

            // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÁRIO DEFINIDO (BRASÍLIA)
            // $dataLocal = date('d/m/Y H:i:s', time());
            $ponto->data = date('d/m/Y', time());
            
            $ponto->save();
            return response($ponto,200)
                    ->header('Content-Type', 'application/json');
           // return redirect('/ponto');
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

