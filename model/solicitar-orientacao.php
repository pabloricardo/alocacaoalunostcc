<?php
    include_once "conferir-autenticacao.php";
	require 'config.php';
    require 'connection.php';
    
    $matriculaAluno = $_SESSION['matricula'];
    $matriculaProfessor = $_POST['matricula'];
    $areaEscolhida = $_POST['area'];

    $link = DBConnect();

    // echo ($matriculaProfessor);
    // $retorno = array('matriculaProfessor' => $matriculaProfessor, 'matricula' => $matricula, 'areaEscolhida' => $areaEscolhida);
    // echo json_encode($retorno);
    

    $query = "insert into solicitacao_de_orientacao (matricula_professor, matricula_aluno, nome_da_area, status) 
    values ($matriculaProfessor , $matriculaAluno, '$areaEscolhida', 'Aguardando')"; 
    
    if($link->query($query)){ 
        $retorno = array('mensagem' => "Solicitação enviada");
    } else{ 
        $retorno = array('mensagem' => "Não foi possível enviar a solicitação");
    } 
        echo json_encode($retorno);
        mysqli_close($link);
?>