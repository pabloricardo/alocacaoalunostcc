<?php
    include_once "conferir-autenticacao.php";
	require 'config.php';
    require 'connection.php';

    $link = DBConnect();
    
    $matriculaProfessor = $_SESSION['matricula'];
    $matriculaAluno = $_POST['matricula'];
    $areaEscolhida = $_POST['area'];

    $sqlProfessor = "SELECT * FROM professores WHERE matricula = $matriculaProfessor";
    //Executa a consulta
	$resultProfessor = $link->query($sqlProfessor);
	//Cria um array da com os dados da consulta
    $rowProfessor = $resultProfessor->fetch_assoc();
    

    $sqlAluno = "SELECT * FROM alunos WHERE matricula = $matriculaAluno ";
    //Executa a consulta
	$resultAluno = $link->query($sqlAluno);
	//Cria um array da com os dados da consulta
    $rowAluno = $resultAluno->fetch_assoc();


    $validaRegras = False;
    //Pega a quantidade de orientações que o professor ainda pode aceitar
    $horasProfessor = $rowProfessor['quantidade_orientacoes'];
    $horasProfessor = intval($horasProfessor);
    //Verifica o TCC do aluno para retira a quantidade nas orientações que o professor pode aceitar
    if($horasProfessor >= 1)
    {
        if($rowAluno['disciplina'] == "Ambas" && $horasProfessor >= 2)
        {            
            $horasProfessor = $horasProfessor - 2;
            $validaRegras = True;
        }
        else if($rowAluno['disciplina'] != "Ambas")
        {
            $horasProfessor = $horasProfessor - 1;
            $validaRegras = True;
        }
        else
        {
            $retorno = array('mensagem' => "Não foi possivel aprovar a solicitação. A quantidade de horas alocadas excederia a disponível para você");
        }
    }else{
        $retorno = array('mensagem' => "Não foi possivel aprovar a solicitação. Você já atingiu o seu limite da quantidade de horas alocadas.");
    }

  
    if($validaRegras)
    {    
        $updateSolicitacaoDeOrientacao = "UPDATE `solicitacao_de_orientacao` SET `status`= 'Aprovado' 
        WHERE matricula_professor = $matriculaProfessor AND matricula_aluno = $matriculaAluno 
        AND nome_da_area = '$areaEscolhida' AND status = 'Aguardando'"; 
        
        if($link->query($updateSolicitacaoDeOrientacao))
        {
            $updateHorasProfessor = "UPDATE `professores` SET `quantidade_orientacoes`= $horasProfessor 
            WHERE matricula = $matriculaProfessor";
            $link->query($updateHorasProfessor);  

            $deleteOutrasSolicitacoesDoAluno = "DELETE FROM `solicitacao_de_orientacao` 
            WHERE matricula_aluno = $matriculaAluno 
            AND status <> 'Aprovado'";
            $link->query($deleteOutrasSolicitacoesDoAluno);
            $retorno = array('mensagem' => "Solicitação aprovada");
        }else{
            $retorno = array('mensagem' => "Não foi possivel aprovar a solicitação");
        }
    }

    echo json_encode($retorno);
    mysqli_close($link);
?>