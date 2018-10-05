<?php

require './config.php';
require './connection.php';

$link = DBConnect();

$nome = $_POST['nome'];


$matricula = $_POST['matricula'];
$email = $_POST['email'];
$disciplina = $_POST['disciplina'];
// $semestre_letivo = strtr($_POST['semestre_letivo'], '/', '-');
// $semestre_letivo = date('Y-m-d', strtotime($semestre_letivo));
//$area = $_POST['area'];
$quantidade_orientacoes = $_POST['quantidade_orientacoes'];
$status = $_POST['status'];
$descricao = $_POST['descricao'];

$areas = $_POST['my-select'];
foreach ($areas as $value) {
	$query = "insert into area_professores (id_area, matricula) 
values ($value , $matricula)";
$link->query($query);
}



$query = "insert into professores (nome, matricula, disciplina, quantidade_orientacoes , email, status, descricao) 
values ('$nome' , $matricula, '$disciplina', $quantidade_orientacoes, '$email', '$status', '$descricao')";

$cadastraProfessorComoUsuario = "insert into usuario (matricula, senha, permissao)
values ($matricula, '$matricula', 2 )";
$link->query($cadastraProfessorComoUsuario);

if($link->query($query)){ 
	$retorno = array('mensagem' => "Cadastrado com Sucesso", 'status' => true);
} else{ 
	echo($query);
	$retorno = array('mensagem' => "Matrícula Já Cadastrada");
} 
    echo json_encode($retorno);
	mysqli_close($link);
?>