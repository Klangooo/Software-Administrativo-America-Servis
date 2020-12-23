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
        $contador_id = 1;
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
              <td>@if($ponto->entrada != NULL && $ponto->verificacao0 == 1) {{$ponto->entrada}} <i class="fa fa-thumbs-up" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif</td>
              <td>@if($ponto->iniciointervalo != NULL && $ponto->verificacao1 == 1) {{$ponto->iniciointervalo}} <i class="fa fa-thumbs-up" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif</td>
              <td>@if($ponto->fimintervalo != NULL && $ponto->verificacao2 == 1) {{$ponto->fimintervalo}} <i class="fa fa-thumbs-up" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif</td>
              <td>@if($ponto->saida != NULL && $ponto->verificacao3 == 1) {{$ponto->saida}} <i class="fa fa-thumbs-up" style="color:#008000; margin-left:7px;" aria-hidden="true"></i> @else <i class="fa fa-times" style="color:#FF0000; margin-left:7px" aria-hidden="true"></i> @endif</td>
              <td> 
                <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir{{$ponto->id}}"></i>
              </td>
            </tr>

                @if($contador > 0)                  
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
              
            <?php $contador_id = $contador_id + 1; ?>
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
                {{Form::text('cpf', '', ['class' => 'form-control'])}}
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
              {{Form::label('entrada', 'Entrada')}}
              {{Form::text('entrada', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('inciointervalo', 'Início do intervalo')}}
              {{Form::text('iniciointervalo', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('fimintervalo', 'Fim do intervalo')}}
              {{Form::text('fimintervalo', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('saida', 'Saída')}}
              {{Form::text('saida', '', ['class' => 'form-control'])}}
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

  @endsection