<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();
    
    $matricula = $_POST['matricula'];

    $link = DBConnect();
    
    $sql = "DELETE FROM alunos WHERE matricula = $matricula";
    $deletarAlunoComoUsuario = "DELETE FROM usuario WHERE matricula = $matricula";

    $link->query($sql);
    $link->query($deletarAlunoComoUsuario);
    //echo($sql);
	mysqli_close($link);
?>