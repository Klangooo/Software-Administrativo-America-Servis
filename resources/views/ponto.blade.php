@extends('layouts.template_base')

@section('content')
<?php
use App\Ponto;
date_default_timezone_set('America/Sao_Paulo');     
?>
<style>
  .primeiralinha {
    background-color:#032066;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .escrita {
    color: black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .titulo{
    /*background-color: #b5d8e6;*/
    color: #032066;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .botao {
    background-color: #032066;
    color: white;
    float: right;
    border-color: white;
  }

  .botao:hover {
    background-color: white;
    color: #032066;
    border-color: #032066;
  }

  .botao2 {
    background-color: #032066;
    color: white;
    border-color: white;
  }

  .botao2:hover {
    background-color: white;
    color: #032066;
    border-color: #032066;
  }

  .centraliza {
    text-align: center;
  }

  .icone:hover {
    transform: scale(1.3);
    color: #48555a;
  }

  .icone {
    transform: scale(1.5);
    cursor: pointer;
    color: #032066;
  }
  .pointer{
    cursor: pointer;
  }

</style>

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Ponto</h1>
      <p class="lead">Acompanhamento dos pontos dos funcionários.</p>
    </div>
  </div>
  <br>
  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
    Criar novo
  </button>

  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalLimparReg">
    Limpar Registros
  </button>


  <form action="busca" method="POST">
    @csrf
      <div class="row">
          <div class="form-group row" style="float:left; padding-left:2.5%">
            <label for="text" class="col-form-label col-sm-0.5">CPF</label>
            <div class="col-sm-2.5" style="padding-left:1%">
              <input type="text" class="form-control input-sm mascara_CPF" id="nomebusca" name="nomebusca" required/>
            </div>
            <label for="date" class="col-form-label col-sm-0.5" style="padding-left:1%">de</label>
            <div class="col-sm-2.5" style="padding-left:1%">
              <input type="date" class="form-control input-sm" id="from" name="from" required/>
            </div>
            <label for="date" class="col-form-label col-sm-0.5" style="padding-left:1%">até</label>
            <div class="col-sm-2.5" style="padding-left:1%">
              <input type="date" class="form-control input-sm" id="to" name="to" required/>
            </div>
            <div class="col-sm">
              <button type="submit" class="btn rounded-pill botao2" name="buscar" title="search">Buscar</button>
            </div>
      </div>
    </div>
  </form>

  <table class="table centraliza table-striped">
      <thead class="primeiralinha">
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Nome</th>
          <th scope="col">Cargo</th>
          <th scope="col">Posto de serviço</th>
          <th scope="col">Entrada</th>
          <th scope="col">Início do Intervalo</th>
          <th scope="col">Fim do Intervalo</th>
          <th scope="col">Saída</th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <?php
        $contador = Ponto::count();
        ?>
      <tbody class="escritas">
        @if($contador == 0)
            <tr> 
              <td>
                Nenhum ponto cadastrado. 
              </td>
            </tr>
        @else
            @foreach($pontos as $ponto)
            <?php $funcionario = DB::table('funcionarios')->where('cpf', $ponto->cpf)->first(); ?>
            <tr>
              <th scope="row">
                <?php
                $date = new DateTime();
                $date->setTimestamp($ponto->timeStampstringiniciar);
                echo $date->format('d/m/Y');
                ?>
              </th>
              <td>{{$funcionario->nome}}</td>
              <td>{{$funcionario->cargo}}</td>
              <td>{{$funcionario->postodeservico}}</td>
              <td>
                @if($ponto->timeStampstringiniciar != NULL)
                  <?php
                  $date = new DateTime();
                  $date->setTimestamp($ponto->timeStampstringiniciar);
                  echo $date->format('H:i:s');
                  ?>
                  @if($ponto->verificacaoiniciar == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc0{{$ponto->id}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc0{{$ponto->id}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td>
                @if($ponto->timeStampstringalmoco != NULL)
                <?php
                $date = new DateTime();
                $date->setTimestamp($ponto->timeStampstringalmoco);
                echo $date->format('H:i:s');
                ?>
                @if($ponto->verificacaoalmoco == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc1{{$ponto->id}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc1{{$ponto->id}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                </td>
                @endif
              <td>
                @if($ponto->timeStampstringretorno != NULL)
                <?php
                $date = new DateTime();
                $date->setTimestamp($ponto->timeStampstringretorno);
                echo $date->format('H:i:s');
                ?>
                @if($ponto->verificacaoretorno == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc2{{$ponto->id}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc2{{$ponto->id}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td>
                @if($ponto->timeStampstringfim != NULL)
                <?php
                $date = new DateTime();
                $date->setTimestamp($ponto->timeStampstringfim);
                echo $date->format('H:i:s');
                ?>
                @if($ponto->verificacaofim == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc3{{$ponto->id}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc3{{$ponto->id}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td> 
                <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir{{$ponto->id}}"></i>
              </td>
            </tr>

                @if($contador > 0) 
                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc0{{$ponto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Localização do ponto</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Latitude: {{$ponto->latitudestringiniciar}}
                              <br>
                              Longitude: {{$ponto->longitudestringiniciar}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc1{{$ponto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Localização do ponto</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Latitude: {{$ponto->latitudestringalmoco}}
                              <br>
                              Longitude: {{$ponto->longitudestringalmoco}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc2{{$ponto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Localização do ponto</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Latitude: {{$ponto->latitudestringretorno}}
                              <br>
                              Longitude: {{$ponto->longitudestringretorno}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc3{{$ponto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Localização do ponto</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Latitude: {{$ponto->latitudestringfim}}
                              <br>
                              Longitude: {{$ponto->longitudestringfim}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL CONFIRMAR EXCLUSÃO -->
                    <div class="modal fade escrita" id="modalExcluir{{$ponto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir ponto</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Deseja excluir o ponto?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>

                            {!!Form::open(['action' => ['PontosController@destroy', $ponto->id], 'method' => 'POST'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Confirmar', ['class' => 'btn btn-secondary rounded-pill botao'])}}
                              {!!Form::close()!!}
                        </div>
                        </div>
                    </div>
                    </div>
                  <!--FIM DO MODAL CONFIRMAR EXCLUSÃO -->
                  @endif
              
            @endforeach
        @endif
      </tbody>
    </table>

    <br><br>

@if($contador > 0)                  
<!-- ABERTURA DO MODAL LIMPAR REGISTROS -->
<div class="modal fade escrita" id="modalLimparReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color:#032066; color:white">
          <h5 class="modal-title" id="exampleModalLabel">Limpar Registros</h5>
          <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        Deseja limpar os registros?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>

          {!!Form::open(['action' => 'PontosController@destroyALL', 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Limpar Registros', ['class' => 'btn btn-secondary rounded-pill botao'])}}
            {!!Form::close()!!}
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL LIMPAR REGISTROS -->
@endif


  <!-- ABERTURA DO MODAL CRIAR NOVO -->
  <div class="modal fade escrita" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#032066; color:white">
            <h5 class="modal-title" id="exampleModalLabel">Criar novo ponto</h5>
            <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
        {!! Form::open(['action' => ['PontosController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('cpf', 'CPF')}}
                {{Form::text('cpf', '', ['class' => 'form-control mascara_CPF'])}}
            </div>
            <div class="form-group">
              {{Form::label('latitude', 'Latitude')}}
              {{Form::text('latitude', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('longitude', 'Longitude')}}
              {{Form::text('longitude', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('data', 'Data')}}
              {{Form::text('data', '', ['class' => 'form-control mascara_DATA'])}}
            </div>
            <div class="form-group">
              {{Form::label('entrada', 'Entrada')}}
              {{Form::text('entrada', '', ['class' => 'form-control mascara_HORA'])}}
            </div>
            <div class="form-group">
              {{Form::label('inciointervalo', 'Início do intervalo')}}
              {{Form::text('iniciointervalo', '', ['class' => 'form-control mascara_HORA'])}}
            </div>
            <div class="form-group">
              {{Form::label('fimintervalo', 'Fim do intervalo')}}
              {{Form::text('fimintervalo', '', ['class' => 'form-control mascara_HORA'])}}
            </div>
            <div class="form-group">
              {{Form::label('saida', 'Saída')}}
              {{Form::text('saida', '', ['class' => 'form-control mascara_HORA'])}}
            </div>
          </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
            {{Form::submit('Criar ponto', ['class'=>'btn btn-secondary rounded-pill botao'])}}
        {!! Form::close() !!}
        </div>
        </div>
    </div>
    </div>
  <!--FIM DO MODAL CRIAR NOVO -->

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
  </script>
  <script type="text/javascript">
      $('.mascara_CPF').mask("000.000.000-00");
      $('.mascara_HORA').mask("00:00:00");
      $('.mascara_DATA').mask("00/00/0000");
  </script>

  @endsection