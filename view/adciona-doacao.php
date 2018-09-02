<?php
require 'config.php';
require 'connection.php';

$nomeItem = $_POST['nome'];
$tipoItem = $_POST['tipo'];
$observacao = $_POST['observacao'];
$tamanho = $_POST['tamanho'];
$genero = $_POST['genero'];
$faixaEtaria = $_POST['faixaEtaria'];


 

$link = DBConnect();
if ( $tipoItem =='Sapato' || $tipoItem == 'Tênis' || $tipoItem == "Botina" || $tipoItem == "Sandalia"|| $tipoItem == "Chinelo" || $tipoItem == "Outro Tipo de Calçado"){

		$query = "INSERT INTO item (NomeItem, TipoItem, Observacao, Tamanho,Situacao) VALUES ('$nomeItem','$tipoItem','$observacao' ,'$tamanho','N');";
				mysqli_multi_query($link,$query);

		$query2 = "INSERT INTO calcado(FaixaEtaria, Genero) VALUES ('$faixaEtaria', '$genero')";
		mysqli_multi_query($link,$query2);
		echo $query;

} elseif ( $tipoItem =='Blusa' || $tipoItem == 'Camiseta' || $tipoItem == "Vestido" || $tipoItem == "Calça"|| $tipoItem == "Outro Tipo de Roupa") {
		$query = "INSERT INTO item (NomeItem, TipoItem, Observacao, Tamanho,Situacao) VALUES ('$nomeItem','$tipoItem','$observacao' ,'$tamanho','N');";
				mysqli_multi_query($link,$query);

		$query2 = "INSERT INTO roupa (Genero, FaixaEtaria) VALUES ('$genero','$faixaEtaria')";
		mysqli_multi_query($link,$query2);
		echo $query;

}
elseif ( $tipoItem =='Mochila' || $tipoItem == 'Chapéu' || $tipoItem == "Boné" || $tipoItem == "Calça"|| $tipoItem == "Relógio"|| $tipoItem == "Outro Tipo de Acessório") {
		$query = "INSERT INTO item (NomeItem,TipoItem, Observacao,Situacao) VALUES ('$nomeItem','$tipoItem','$observacao','N')";
		//$query .= "INSERT INTO acessorio (IdItem) VALUES ('$genero','$faixaEtaria')";
		mysqli_multi_query($link,$query);
		echo $query;

}

DBClose($link);


header("Location:doacao.php");
?>