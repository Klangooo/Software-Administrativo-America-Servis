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

</style>

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Ponto</h1>
      <p class="lead">Acompanhamento dos pontos dos funcionários.</p>
    </div>
  </div>

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
        </tr>
      </thead>
      <tbody class="escritas"> 
        <tr>
          <th scope="row">18/04/1999</th>
          <td>Vitória</td>
          <td>Assessora de Projetos</td>
          <td>Distribuidora de cargas</td>
          <td>12h01</td>
          <td>13h00</td>
          <td>14h00</td>
          <td>18h00</td>
        </tr>
        <tr>
          <th scope="row">22/01/2001</th>
          <td>Aline</td>
          <td>Assessora de JF</td>
          <td>Distribuidora de cargas</td>
          <td>12h01</td>
          <td>13h20</td>
          <td>14h20</td>
          <td>18h00</td>
        </tr>
        <tr>
          <th scope="row">04/12/2000</th>
          <td>Luigi</td>
          <td>Assessor de Projetos</td>
          <td>Distribuidora de cargas</td>
          <td>12h01</td>
          <td>13h10</td>
          <td>14h10</td>
          <td>18h00</td>
        </tr>
      </tbody>
    </table>

    <br><br>

    <!-- ABERTURA DO MODAL LIMPAR REGISTROS -->
<div class="modal fade escrita" id="modalLimparReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Limpar Registros</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="mx-auto" style="width: 400px;">
      <div class="modal-body">
        Deseja limpar os registros?
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary rounded-pill botao" data-dismiss="modal">Limpar Registros</button>
      </div>
      </div>
  </div>
  </div>
<!--FIM DO MODAL LIMPAR REGISTROS -->

<!--
  <form class="form" method="post" enctype="multipart/form-data" action="/ponto">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row form-custom" id="InputForm">
    
      <div class="form-group col-md-6">
          <label for="inputName">Nome Completo</label>
          <input type="text" class="form-control" id="inputName" name="nName" placeholder="Ex: José" aria-required>
      </div>
      <div class="form-group col-md-3">
          <label for="inputApelido">Cargo</label>
          <input type="text" class="form-control" id="inputApelido" name="nCargo" placeholder="Ex: Zé">
      </div>
      <div class="form-group col-md-3">
          <label for="inputProfissao">Localização</label>
          <input type="text" class="form-control" id="inputProfissao" name="nLocalizacao" aria-required>
      </div>
      <div class="form-group col-md-8">
          <label for="inputAddress">Ponto início</label>
          <input type="text" class="form-control" id="inputAddress" name="nPontoinicio" placeholder="Ex: Rua Xxx, nº xx" aria-required>
      </div>
      <div class="form-group col-md-4">
          <label for="inputComplemento">Ponto almoço</label>
          <input type="text" class="form-control" id="inputComplemento" name="nPontoalmoco" placeholder="Apartamento, hotel, casa, etc.">
      </div>
      <div class="form-group col-md-4">
          <label for="inputCity">Ponto final</label>
          <input type="text" class="form-control" id="inputCity" name="nPontofinal" aria-required>
      </div>

    </div>  
    <br>
    <button type="submit" class="btn btn-danger rounded-pill" name="reg_ponto">Salvar</button>
</div>
</div>
</form>

-->

<?php
/*
$result_alunos = "SELECT * FROM tabelapontos";
$resultado_alunos = mysqli_query($db, $result_alunos);
?>

<div style="margin-left: 0%" class="row"> 

<?php 
while($row_aluno = mysqli_fetch_assoc($resultado_alunos)){
?>

<div class="card" style="width: 32.3%; margin-right:1%; margin-bottom:1%;">
    <div class="card-body">

        <?php
        echo "" . $row_aluno['nome'] . "<br>";
        echo "" . $row_aluno['cargo'] . "<br>";
        echo "" . $row_aluno['localizacao'] . "<br>";
        echo "" . $row_aluno['pontoinicio'] . "<br>";
        echo "" . $row_aluno['pontoalmoco'] . "<br>";
        echo "" . $row_aluno['pontofinal'] . "<br><hr>";
        ?>

    </div>
</div>

<?php
}
*/
?>


  </div>

  @endsection