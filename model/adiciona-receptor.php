<?php

require '../view/config.php';
require '../view/connection.php';

$nome = $_POST['nome'];
$identificador = $_POST['identificador'];
$cpf = $_POST['cpf'];
$dtNascimento = strtr($_POST['dtNascimento'], '/', '-');
$dtNascimento = date('Y-m-d', strtotime($dtNascimento));
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$tipo = $_POST['tipo'];
$cnpj = $_POST['cnpj'];


$link = DBConnect();


if ($tipo == "fisica" && ($cpf && $nome && $identificador && $endereco && $cep)) {
	$sql = "insert into receptor (Identificador,Nome,CPF,Sexo,Telefone,DataNascimento,CEP,Endereco,Numero,TipoCadastro) 
	values ($identificador,'$nome','$cpf','$sexo','$telefone','$dtNascimento','$cep','$endereco',$numero,'$tipo')";
	$result = $link->query($sql);
	$retorno = array('resp' => true);
}elseif ($tipo == "juridica" & ($cnpj && $nome && $identificador && $endereco && $cep)) {
	$sql = "insert into receptor (Identificador,Nome,Telefone,CEP,Endereco,Numero,TipoCadastro,CNPJ) 
values ($identificador,'$nome','$telefone','$cep','$endereco',$numero,'$tipo','$cnpj')";
$result = $link->query($sql);
$retorno = array('resp' => true);
}else {$retorno = array('resp' => false);}


echo json_encode($retorno);

mysqli_close($link);
?>


