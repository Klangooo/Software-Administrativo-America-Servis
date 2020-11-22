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

<!-- ABERTURA DO MODAL CRIAR NOVO-->
<div class="modal fade escrita" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar novo usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" style="margin-left: 50%">
          <h5>Nome</h5>
          <input type="text" id="campo"> 
          <h5>E-mail</h5>
          <input type="text" id="campo">
          <h5>Cargo</h5>
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

<!-- ABERTURA DO MODAL EDITAR USUÁRIO -->
<div class="modal fade escrita" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <h5>Nome</h5>
          <input type="text" id="campo"> 
          <h5>E-mail</h5>
          <input type="text" id="campo">
          <h5>Cargo</h5>
          <input type="text" id="campo">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary rounded-pill botao">Salvar edição</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL EDITAR USUÁRIO -->

<!-- ABERTURA DO MODAL CONFIRMAR EXCLUSÃO -->
<div class="modal fade escrita" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          Deseja excluir o usuário?
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
      <h1 class="display-4">Usuários</h1>
      <p class="lead">Administração de usuários.</p>
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
        <th scope="col">E-mail</th>
        <th scope="col">Cargo</th>
        <th scope="col"> </th>
      </tr>
    </thead>
    <tbody class="escritas"> 
      <tr>
        <th scope="row">1</th>
        <td>Vitória</td>
        <td>vitoriabueno@conselt.com.br</td>
        <td>Assessora de Projetos</td>
        <td> 
          <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
          <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Aline</td>
        <td>alinematias@conselt.com.br</td>
        <td>Assessora de JF</td>
        <td> 
          <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
          <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Luigi</td>
        <td>luiginegrini@conselt.com.br</td>
        <td>Assessor de Projetos</td>
        <td> 
          <i class="fas fa-pencil-alt icone" data-toggle="modal" style="margin-right: 17px" data-target="#modalEditar"></i>
          <i class="fas fa-times icone" data-toggle="modal" data-target="#modalExcluir"></i>
        </td>
      </tr>
    </tbody>
  </table>

  </div>

  @endsection