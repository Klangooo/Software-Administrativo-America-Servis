@extends('layouts.template_base')

@section('content')

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
    background-color: white;
    color: #032066;
    float: right;
    border-color: #032066;
  }

  .botao:hover {
    background-color: #032066;
    color: white;
    border-color: white;
  }

  .centraliza {
    text-align: center;
  }

  .icone:hover {
    transform: scale(1.3);
  }

  .icone {
    transform: scale(1.5);
    margin-top: 9px
  }

</style>

<!-- ABERTURA DO MODAL CRIAR NOVO -->
<div class="modal fade escrita" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar novo funcionário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <h5>Nome</h5>
          <input type="text" id="campo"> 
          <h5>CPF</h5>
          <input type="text" id="campo">
          <h5>Cargo</h5>
          <input type="text" id="campo">
          <h5>Posto de Serviço</h5>
          <input type="text" id="campo">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary rounded-pill botao">Salvar mudanças</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL CRIAR NOVO -->

<!-- ABERTURA DO MODAL EDITAR FUNCIONÁRIO -->
<div class="modal fade escrita" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar funcionário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <h5>Nome</h5>
          <input type="text" id="campo"> 
          <h5>CPF</h5>
          <input type="text" id="campo">
          <h5>Cargo</h5>
          <input type="text" id="campo">
          <h5>Posto de serviço</h5>
          <input type="text" id="campo">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary rounded-pill botao">Salvar edição</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL EDITAR FUNCIONÁRIO -->

<!-- ABERTURA DO MODAL CONFIRMAR EXCLUSÃO -->
<div class="modal fade escrita" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Exluir funcionário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          Você deseja excluir o funcionário?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary rounded-pill botao">Confirmar</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL CONFIRMAR EXCLUSÃO -->

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Funcionários</h1>
      <p class="lead">Acompanhamento dos funcionários cadastrados.</p>
    </div>
  </div>

  <table class="table centraliza table-striped">
      <thead class="primeiralinha">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Cargo</th>
          <th scope="col">Posto de serviço</th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody class="escritas"> 
        <tr>
          <th scope="row">1</th>
          <td>Vitória</td>
          <td>123.123.123-12</td>
          <td>Assessora de Projetos</td>
          <td>Distribuidor de cargas</td>
          <td> 
            <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
            <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Aline</td>
          <td>123.123.123-12</td>
          <td>Assessora de JF</td>
          <td>Distribuidor de cargas</td>
          <td> 
            <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
            <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Luigi</td>
          <td>123.123.123-12</td>
          <td>Assessor de Projetos</td>
          <td>Distribuidor de cargas</td>
          <td> 
            <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
            <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
          </td>
        </tr>
      </tbody>
    </table>

    <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
      Criar novo
    </button>
    <br><br>

  </div>

  @endsection