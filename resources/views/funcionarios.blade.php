@extends('layouts.template_base')

@section('content')
<?php
use App\Funcionario;
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
    color: #02acee;
  }

  .icone {
    transform: scale(1.5);
    margin-top: 9px;
    cursor: pointer;
  }

</style>

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Funcionários</h1>
      <p class="lead">Acompanhamento dos funcionários cadastrados.</p>
    </div>
  </div>

  <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
    Criar novo
  </button>
  <br><br>

  <table class="table centraliza table-striped">
      <thead class="primeiralinha">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Cargo</th>
          <th scope="col">Posto de serviço</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <?php
        $contador = Funcionario::count();
        $contador_id = 1;
        ?>
      <tbody class="escritas">
        @if($contador == 0)
            <tr> 
              <td>
                Nenhum funcionário cadastrado. 
              </td>
            </tr>
        @else
            @foreach($funcionarios as $funcionario)
            <tr>
              <th scope="row">{{$contador_id}}</th>
              <td>{{$funcionario->nome}}</td>
              <td>{{$funcionario->cpf}}</td>
              <td>{{$funcionario->cargo}}</td>
              <td>{{$funcionario->postodeservico}}</td>
              <td> 
                <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar{{$funcionario->id}}"></i>
                <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir{{$funcionario->id}}"></i>
              </td>
            </tr>

                @if($contador > 0)
                  <!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
                  <div class="modal fade escrita" id="modalEditar{{$funcionario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
                            <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
                        {!! Form::open(['action' => ['FuncionariosController@update', $funcionario->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                          <div class="form-group">
                              {{Form::label('nome', 'Nome')}}
                              {{Form::text('nome', $funcionario->nome, ['class' => 'form-control', 'placeholder' => 'Nome'])}}
                          </div>
                          <div class="form-group">
                              {{Form::label('cpf', 'Cpf')}}
                              {{Form::text('cpf', $funcionario->cpf, ['class' => 'form-control mascara_CPF', 'placeholder' => 'CPF'])}}
                          </div>
                          <div class="form-group">
                            {{Form::label('cargo', 'Cargo')}}
                            {{Form::text('cargo', $funcionario->cargo, ['class' => 'form-control', 'placeholder' => 'Cargo'])}}
                          </div>
                          <div class="form-group">
                            {{Form::label('postodeservico', 'Posto de Serviço')}}
                            {{Form::text('postodeservico', $funcionario->postodeservico, ['class' => 'form-control', 'placeholder' => 'Posto de Serviço'])}}
                          </div>
                        </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
                          {{Form::hidden('_method', 'PUT')}}
                          {{Form::submit('Salvar Mudanças', ['class'=>'btn btn-secondary rounded-pill botao'])}}
                        {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                    </div>
                  <!-- FIM DO MODAL EDITAR FUNCIONÁRIO -->
                  
                  <!-- ABERTURA DO MODAL CONFIRMAR EXCLUSÃO -->
                    <div class="modal fade escrita" id="modalExcluir{{$funcionario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style="background-color:#032066; color:white">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir funcionário</h5>
                            <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Deseja excluir o funcionário?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>

                            {!!Form::open(['action' => ['FuncionariosController@destroy', $funcionario->id], 'method' => 'POST'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Confirmar', ['class' => 'btn btn-primary rounded-pill botao'])}}
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

  </div>


<!-- ABERTURA DO MODAL CRIAR NOVO -->
<div class="modal fade escrita" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color:#032066; color:white">
          <h5 class="modal-title" id="exampleModalLabel">Criar novo funcionário</h5>
          <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div style="margin-left:3.3%; margin-right:3.3%; margin-top:2%">
      {!! Form::open(['action' => ['FuncionariosController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
              {{Form::label('nome', 'Nome')}}
              {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome'])}}
          </div>
          <div class="form-group">
              {{Form::label('cpf', 'Cpf')}}
              {{Form::text('cpf', '', ['class' => 'form-control mascara_CPF', 'placeholder' => 'CPF'])}}
          </div>
          <div class="form-group">
            {{Form::label('cargo', 'Cargo')}}
            {{Form::text('cargo', '', ['class' => 'form-control', 'placeholder' => 'Cargo'])}}
          </div>
          <div class="form-group">
            {{Form::label('postodeservico', 'Posto de Serviço')}}
            {{Form::text('postodeservico', '', ['class' => 'form-control', 'placeholder' => 'Posto de Serviço'])}}
          </div>
        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          {{Form::submit('Salvar Mudanças', ['class'=>'btn btn-secondary rounded-pill botao'])}}
       {!! Form::close() !!}
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL CRIAR NOVO -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
</script>
<script type="text/javascript">
    $('.mascara_CPF').mask("000.000.000-00");
</script>

@endsection