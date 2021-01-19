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
            $VARlatitude = abs($latitude - $funcionario->latitude);
            $VARlongitude = abs($longitude - $funcionario->longitude);
                        
            // Create Post
            $ponto = new Ponto;
            $ponto->cpf = $funcionario->cpf;

            if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                $ponto->verificacao0 = '1';
                $ponto->verificacao1 = '1';
                $ponto->verificacao2 = '1';
                $ponto->verificacao3 = '1';
            } else {
                $ponto->verificacao0 = '0';
                $ponto->verificacao1 = '0';
                $ponto->verificacao2 = '0';
                $ponto->verificacao3 = '0';
            }

            $ponto->data = $request->input('data');
            $ponto->entrada = $request->input('entrada');
            $ponto->iniciointervalo = $request->input('iniciointervalo');
            $ponto->fimintervalo = $request->input('fimintervalo');
            $ponto->saida = $request->input('saida');

            $ponto->latitude0 = $latitude;
            $ponto->longitude0 = $longitude;
            $ponto->latitude1 = $latitude;
            $ponto->longitude1 = $longitude;
            $ponto->latitude2 = $latitude;
            $ponto->longitude2 = $longitude;
            $ponto->latitude3 = $latitude;
            $ponto->longitude3 = $longitude;

            $ponto->save();
            return redirect('/ponto');
        }
       
    }

    /*
    public function storeApp(Request $request)
    {
        // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
        date_default_timezone_set('America/Sao_Paulo');     

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
            $VARlatitude = abs($latitude - $funcionario->latitude);
            $VARlongitude = abs($longitude - $funcionario->longitude);
                        
            $pontoAtual = DB::table('pontos')
                            ->where('data', date('d/m/Y'), time())
                            ->where('cpf', $cpf)
                            ->first();

            if($pontoAtual)
            {
                $ponto = Ponto::find($pontoAtual->id);
                // Update Post
                if($request->almoco)
                {
                    $ponto->iniciointervalo = substr($request->almoco, 11, 8);
                    $ponto->latitude1 = $latitude;
                    $ponto->longitude1 = $longitude;
                    if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                        $ponto->verificacao1 = '1';
                    } else {
                        $ponto->verificacao1 = '0';
                    }
                } 
                if($request->fim)
                {
                    $ponto->fimintervalo = substr($request->fim, 11, 8);
                    $ponto->latitude2 = $latitude;
                    $ponto->longitude2 = $longitude;
                    if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                        $ponto->verificacao2 = '1';
                    } else {
                        $ponto->verificacao2 = '0';
                    }
                } 
                if($request->saida)
                {
                    $ponto->saida = substr($request->saida, 11, 8);
                    $ponto->latitude3 = $latitude;
                    $ponto->longitude3 = $longitude;
                    if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                        $ponto->verificacao3 = '1';
                    } else {
                        $ponto->verificacao3 = '0';
                    }
                } 

                $ponto->save();
                return response()->json($ponto)
                    ->header('Content-Type', 'application/json');
            }

            // Create Post
            $ponto = new Ponto;
            $ponto->cpf = $funcionario->cpf;
            $ponto->latitude0 = $latitude;
            $ponto->longitude0 = $longitude;
            if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                $ponto->verificacao0 = '1';
            } else {
                $ponto->verificacao0 = '0';
            }

            $ponto->entrada = substr($request->entrada, 11, 8); // date('H:i:s', time());

            // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÁRIO DEFINIDO (BRASÍLIA)
            // $dataLocal = date('d/m/Y H:i:s', time());
            $ponto->data = date('d/m/Y', time());
            
            $ponto->save();
            return response($ponto,200)
                    ->header('Content-Type', 'application/json');
           // return redirect('/ponto');
        }
    } */




    public function storeApp(Request $request)
    {
        foreach($request->valores as $registro)
        {
            $ponto = $registro[0];
            $cpf = substr(explode("_",$ponto)[0],1,14);

            $pattern = "/[^A-Za-z]/i";
            $campo = preg_replace($pattern, "", $ponto); // Outputs "Visit W3Schools!"

            $valor = $registro[1];

            $funcionario = DB::table('funcionarios')->where('cpf', $cpf)->first();
            if (!$funcionario)
            {
                return response('Funcionario não existente', 400)
                        ->header('Content-Type', 'application/json');
                //erro de cpf
            }
            else
            {
                $pontoAtual = DB::table('pontos')
                            ->where('cpf', $cpf)
                            ->where('fimdajornada', 'false')
                            ->first();

                if($pontoAtual)
                {
                    $ponto = Ponto::find($pontoAtual->id);

                    if($campo=="latitudestringalmoco")
                    {
                        $ponto->latitudestringalmoco = $valor;
                    }
                    if($campo=="latitudestringiniciar")
                    {
                        $ponto->latitudestringiniciar = $valor;
                    }
                    if($campo=="latitudestringretorno")
                    {
                        $ponto->latitudestringretorno = $valor;
                    }
                    
                    if($campo=="longitudestringalmoco")
                    {
                        $ponto->longitudestringalmoco = $valor;
                    }
                    if($campo=="longitudestringfim")
                    {
                        $ponto->longitudestringfim = $valor;
                    }
                    if($campo=="longitudestringiniciar")
                    {
                        $ponto->longitudestringiniciar = $valor;
                    }
                    if($campo=="longitudestringretorno")
                    {
                        $ponto->longitudestringretorno = $valor;
                    }
                    if($campo=="timeStampstringalmoco")
                    {
                        $ponto->timeStampstringalmoco = $valor;
                    }
                    if($campo=="timeStampstringfim")
                    {
                        $ponto->timeStampstringfim = $valor;
                        if(!$ponto->latitudestringiniciar)
                        {
                            $ponto->fimdajornada = 'true';
                        }
                    }
                    if($campo=="timeStampstringiniciar")
                    {
                        $ponto->timeStampstringiniciar = $valor;
                        if(!$ponto->latitudestringalmoco)
                        {
                            $ponto->fimdajornada = 'true';
                        }
                    }
                    if($campo=="timeStampstringretorno")
                    {
                        $ponto->timeStampstringretorno = $valor;
                        $ponto->fimdajornada = 'true';
                    }
                    if($campo=="latitudestringfim")
                    {
                        $ponto->latitudestringfim = $valor;
                    }
                    if($ponto->latitudestringalmoco && $ponto->longitudestringalmoco)
                    {
                        $VARlatitude = abs($ponto->latitudestringalmoco - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringalmoco - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoalmoco = '1';
                        } else {
                            $ponto->verificacaoalmoco = '0';
                        }
                    }
                    if($ponto->latitudestringfim && $ponto->longitudestringfim)
                    {
                        $VARlatitude = abs($ponto->latitudestringfim - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringfim - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaofim = '1';
                        } else {
                            $ponto->verificacaofim = '0';
                        }
                    }
                    if($ponto->latitudestringiniciar && $ponto->longitudestringiniciar)
                    {
                        $VARlatitude = abs($ponto->latitudestringiniciar - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringiniciar - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoiniciar = '1';
                        } else {
                            $ponto->verificacaoiniciar = '0';
                        }
                    }
                    if($ponto->latitudestringretorno && $ponto->longitudestringretorno)
                    {
                        $VARlatitude = abs($ponto->latitudestringretorno - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringretorno - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoretorno = '1';
                        } else {
                            $ponto->verificacaoretorno = '0';
                        }
                    }
                    
                    $ponto->save();

                }
                else
                {                    
                    $ponto = new Ponto;
                    $ponto->cpf = $funcionario->cpf;
                    $ponto->fimdajornada = 'false';
                    if($campo=="latitudestringalmoco")
                    {
                        $ponto->latitudestringalmoco = $valor;
                    }
                    if($campo=="latitudestringiniciar")
                    {
                        $ponto->latitudestringiniciar = $valor;
                    }
                    if($campo=="latitudestringretorno")
                    {
                        $ponto->latitudestringretorno = $valor;
                    }
                    if($campo=="longitudestringalmoco")
                    {
                        $ponto->longitudestringalmoco = $valor;
                    }
                    if($campo=="longitudestringfim")
                    {
                        $ponto->longitudestringfim = $valor;
                    }
                    if($campo=="longitudestringiniciar")
                    {
                        $ponto->longitudestringiniciar = $valor;
                    }
                    if($campo=="longitudestringretorno")
                    {
                        $ponto->longitudestringretorno = $valor;
                    }
                    if($campo=="timeStampstringalmoco")
                    {
                        $ponto->timeStampstringalmoco = $valor;
                    }
                    if($campo=="timeStampstringfim")
                    {
                        $ponto->timeStampstringfim = $valor;
                        if(!$ponto->latitudestringiniciar)
                        {
                            $ponto->fimdajornada = 'true';
                        }
                    }
                    if($campo=="timeStampstringiniciar")
                    {
                        $ponto->timeStampstringiniciar = $valor;
                        if(!$ponto->latitudestringalmoco)
                        {
                            $ponto->fimdajornada = 'true';
                        }
                    }
                    if($campo=="timeStampstringretorno")
                    {
                        $ponto->timeStampstringretorno = $valor;
                        $ponto->fimdajornada = 'true';
                    }
                    if($campo=="latitudestringfim")
                    {
                        $ponto->latitudestringfim = $valor;
                    }
                    if($ponto->latitudestringalmoco && $ponto->longitudestringalmoco)
                    {
                        $VARlatitude = abs($ponto->latitudestringalmoco - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringalmoco - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoalmoco = '1';
                        } else {
                            $ponto->verificacaoalmoco = '0';
                        }
                    }
                    if($ponto->latitudestringfim && $ponto->longitudestringfim)
                    {
                        $VARlatitude = abs($ponto->latitudestringfim - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringfim - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaofim = '1';
                        } else {
                            $ponto->verificacaofim = '0';
                        }
                    }
                    if($ponto->latitudestringiniciar && $ponto->longitudestringiniciar)
                    {
                        $VARlatitude = abs($ponto->latitudestringiniciar - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringiniciar - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoiniciar = '1';
                        } else {
                            $ponto->verificacaoiniciar = '0';
                        }
                    }
                    if($ponto->latitudestringretorno && $ponto->longitudestringretorno)
                    {
                        $VARlatitude = abs($ponto->latitudestringretorno - $funcionario->latitude);
                        $VARlongitude = abs($ponto->longitudestringretorno - $funcionario->longitude);
                        if($VARlatitude < 0.008993 && $VARlongitude < 0.008993){
                            $ponto->verificacaoretorno = '1';
                        } else {
                            $ponto->verificacaoretorno = '0';
                        }
                    }
                        
                    $ponto->save();
                    
                }
            }

        }
    }










    /*
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
    */

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

