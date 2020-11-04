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

</style>

<!-- ABERTURA DO MODAL -->
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
<<<<<<< HEAD
          <h5>Posto de Serviço</h5>
=======
          <h5>Posto de serviço</h5>
>>>>>>> de8b410c58f6146845a02e6508f5f2aa729b19cd
          <input type="text" id="campo">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary rounded-pill botao">Salvar mudanças</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL -->

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
        </tr>
      </thead>
      <tbody class="escritas"> 
        <tr>
          <th scope="row">1</th>
          <td>Vitória</td>
          <td>123.123.123-12</td>
          <td>Assessora de Projetos</td>
          <td>Distribuidor de cargas</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Aline</td>
          <td>123.123.123-12</td>
          <td>Assessora de JF</td>
          <td>Distribuidor de cargas</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Luigi</td>
          <td>123.123.123-12</td>
          <td>Assessor de Projetos</td>
          <td>Distribuidor de cargas</td>
        </tr>
      </tbody>
    </table>

    <button type="button" class="btn rounded-pill botao" style="margin-right: 10px" data-toggle="modal" data-target="#modalExemplo">
      Criar novo
    </button>
    <br><br>

  </div>

  @endsection