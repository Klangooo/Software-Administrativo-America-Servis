@extends('layouts.template_base')

@section('content')
<?php
use App\Ponto;
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

  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
    Criar novo
  </button>

  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalLimparReg">
    Limpar Registros
  </button>
  <br><br>
  
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
              <th scope="row">{{$ponto->data}}</th>
              <td>{{$funcionario->nome}}</td>
              <td>{{$funcionario->cargo}}</td>
              <td>{{$funcionario->postodeservico}}</td>
              <td>
                @if($ponto->entrada != NULL)
                  {{$ponto->entrada}} @if($ponto->verificacao0 == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc0{{$funcionario->id()}}{{$ponto->data}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc0{{$funcionario->id}}{{$ponto->data}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td>
                @if($ponto->iniciointervalo != NULL)
                  {{$ponto->iniciointervalo}} @if($ponto->verificacao1 == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc1{{$funcionario->id}}{{$ponto->data}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc1{{$funcionario->id}}{{$ponto->data}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                </td>
                @endif
              <td>
                @if($ponto->fimintervalo != NULL)
                  {{$ponto->fimintervalo}} @if($ponto->verificacao2 == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc2{{$funcionario->id}}{{$ponto->data}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc2{{$funcionario->id}}{{$ponto->data}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td>
                @if($ponto->saida != NULL)
                  {{$ponto->saida}} @if($ponto->verificacao3 == 1) <i class="fa fa-thumbs-up pointer" data-toggle="modal" data-target="#modalLoc3{{$funcionario->id}}{{$ponto->data}}" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times pointer" data-toggle="modal" data-target="#modalLoc3{{$funcionario->id}}{{$ponto->data}}" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif
                @endif
              </td>
              <td> 
                <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir{{$ponto->id}}"></i>
              </td>
            </tr>

                @if($contador > 0) 
                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc0{{$funcionario->id}}{{$ponto->data}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Localização do ponto
                              Latitude: {{$ponto->latitude0}}
                              Longitude: {{$ponto->longitude0}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc1{{$funcionario->id}}{{$ponto->data}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Localização do ponto
                              Latitude: {{$ponto->latitude1}}
                              Longitude: {{$ponto->longitude1}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc2{{$funcionario->id}}{{$ponto->data}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Localização do ponto
                              Latitude: {{$ponto->latitude2}}
                              Longitude: {{$ponto->longitude2}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->

                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalLoc3{{$funcionario->id}}{{$ponto->data}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                          <div class="form-group">
                              Localização do ponto
                              Latitude: {{$ponto->latitude3}}
                              Longitude: {{$ponto->longitude3}}
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