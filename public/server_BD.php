<?php /*
session_start();

// initializing variables
  $nome = "";
  $cargo = "";
  $localizacao = "";
  $pontoinicio = "";
  $pontoalmoco = "";
  $pontofinal = "";

// connect to the database
$db = mysqli_connect('ec2-18-210-180-94.compute-1.amazonaws.com', 'fhqwcfbqsblerd', '657aa790230b9156e0e7f65b120e1203b32cde1e47b3f0d2361c12e6c9c9f581', 'd33pngfto90g6s');

// REGISTER USER
if (isset($_POST['reg_ponto'])) {
  // receive all input values from the form
  $nome = mysqli_real_escape_string($db, $_POST['nNome']);
  $cargo = mysqli_real_escape_string($db, $_POST['nCargo']);
  $localizacao = mysqli_real_escape_string($db, $_POST['nLocalizacao']);
  $pontoinicio = mysqli_real_escape_string($db, $_POST['nPontoinicio']);
  $pontoalmoco = mysqli_real_escape_string($db, $_POST['nPontoalmoco']);
  $pontofinal = mysqli_real_escape_string($db, $_POST['nPontofinal']);

  // Finally, register user if there are no errors in the form
  $query_insere = "INSERT INTO tabelapontos (nome, cargo, localizacao, pontoinicio, pontoalmoco, pontofinal) VALUES('$nome', '$cargo', '$localizacao', '$pontoinicio', '$pontoalmoco', '$pontofinal')";
  mysqli_query($db, $query_insere);
}
 */





/* EDIT USER
if (isset($_POST['edit_aluno'])) {
  $id = filter_input(INPUT_POST, 'nID', FILTER_SANITIZE_NUMBER_INT);
  $name = filter_input(INPUT_POST, 'nName', FILTER_SANITIZE_STRING);
  $apelido = filter_input(INPUT_POST, 'nApelido', FILTER_SANITIZE_STRING);
  $profissao = filter_input(INPUT_POST, 'nProfissao', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'nAddress', FILTER_SANITIZE_STRING);
  $complemento = filter_input(INPUT_POST, 'nComplemento', FILTER_SANITIZE_STRING);
  $city = filter_input(INPUT_POST, 'nCity', FILTER_SANITIZE_STRING);
  $estado = filter_input(INPUT_POST, 'nEstado', FILTER_SANITIZE_STRING);
  $cep = filter_input(INPUT_POST, 'nCEP', FILTER_SANITIZE_STRING);
  $dt = filter_input(INPUT_POST, 'nDT', FILTER_SANITIZE_STRING);
  $tel = filter_input(INPUT_POST, 'nTel', FILTER_SANITIZE_STRING);
  $cel = filter_input(INPUT_POST, 'nCEL', FILTER_SANITIZE_STRING);
  $nac = filter_input(INPUT_POST, 'nNac', FILTER_SANITIZE_STRING); 
  $ec= filter_input(INPUT_POST, 'nEC', FILTER_SANITIZE_STRING);
  $nm = filter_input(INPUT_POST, 'nNM', FILTER_SANITIZE_STRING);
  $np = filter_input(INPUT_POST, 'nNP', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'nRG', FILTER_SANITIZE_STRING);
  $cpf = filter_input(INPUT_POST, 'nCPF', FILTER_SANITIZE_STRING);
  $regcnh = filter_input(INPUT_POST, 'nRegCNH', FILTER_SANITIZE_STRING);
  $catcnh = filter_input(INPUT_POST, 'nCatCNH', FILTER_SANITIZE_STRING);
  $pontoscnh = filter_input(INPUT_POST, 'nPontosCNH', FILTER_SANITIZE_STRING);
  $emcnh = filter_input(INPUT_POST, 'nEmCNH', FILTER_SANITIZE_STRING);
  $valcnh = filter_input(INPUT_POST, 'nValCNH', FILTER_SANITIZE_STRING);
  $curso = filter_input(INPUT_POST, 'nCurso', FILTER_SANITIZE_STRING);
  $turma = filter_input(INPUT_POST, 'nTurma', FILTER_SANITIZE_STRING);
  $pag = filter_input(INPUT_POST, 'nPag', FILTER_SANITIZE_STRING);
  $obs = filter_input(INPUT_POST, 'nOBS', FILTER_SANITIZE_STRING);


  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
  $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
  $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload


  $query_edit = "UPDATE alunos SET inputName='$name', inputApelido='$apelido', inputProfissao='$profissao', inputAddress='$address', inputComplemento='$complemento', inputCity='$city', inputEstado='$estado', inputCEP='$cep', inputDT='$dt', inputTel='$tel', inputCEL='$cel', inputNac='$nac', inputEC='$ec', inputNM='$nm', inputNP='$np', inputRG='$rg', inputCPF='$cpf', inputRegCNH='$regcnh', inputCatCNH='$catcnh', inputPontosCNH='$pontoscnh', inputEmCNH='$emcnh', inputValCNH='$valcnh', inputCurso='$curso', inputTurma='$turma', inputPag='$pag', inputOBS='$obs', inputArquivo='$novo_nome' WHERE id='$id'";
  mysqli_query($db, $query_edit);                                                                            
}

//DELETE USER
if (isset($_POST['delete_aluno'])) {
  $id = filter_input(INPUT_POST, 'nID', FILTER_SANITIZE_NUMBER_INT);
  $query_delete = "DELETE FROM alunos WHERE id='$id'";
	mysqli_query($db, $query_delete);
}

if (isset($_POST['pesquisar'])) {
  $pesquisar = $_POST['pesquisar'];
    $result_alunos = "SELECT * FROM alunos WHERE inputName LIKE '%$pesquisar%' LIMIT 5";
    $resultado_alunos = mysqli_query($db, $result_alunos);
}
*/

?>