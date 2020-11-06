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

<div style="background-color: #e5e6e7">
  <div class="titulo">
    <div class="container">
      <h1 class="display-4">Ponto</h1>
      <p class="lead">Acompanhamento dos pontos dos funcionários.</p>
    </div>
  </div>

  <table class="table centraliza table-striped">
      <thead class="primeiralinha">
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Nome</th>
          <th scope="col">Cargo</th>
          <th scope="col">Posto de serviço</th>
          <th scope="col">Ponto início</th>
          <th scope="col">Horário de almoço</th>
          <th scope="col">Ponto final</th>
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
          <td>18h00</td>
        </tr>
        <tr>
          <th scope="row">22/01/2001</th>
          <td>Aline</td>
          <td>Assessora de JF</td>
          <td>Distribuidora de cargas</td>
          <td>12h01</td>
          <td>13h20</td>
          <td>18h00</td>
        </tr>
        <tr>
          <th scope="row">04/12/2000</th>
          <td>Luigi</td>
          <td>Assessor de Projetos</td>
          <td>Distribuidora de cargas</td>
          <td>12h01</td>
          <td>13h10</td>
          <td>18h00</td>
        </tr>
      </tbody>
    </table>

    <br><br>


  <form class="form" method="post" enctype="multipart/form-data" action="/ponto">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row form-custom" id="InputForm">
  
      <!-- Dados Pessoais -->
  
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