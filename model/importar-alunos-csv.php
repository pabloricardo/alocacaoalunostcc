<?php
require '../view/config.php';
require '../view/connection.php';
$link = DBConnect();

$disciplina = $_POST['disciplina'];

if(isset($_POST["import"]) && $disciplina){
    $filename=$_FILES["file"]["tmp_name"];	

     if($_FILES["file"]["size"] > 0)
     {
         
        $file = fopen($filename, "r");

        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
         {

            if($getData[0] != 0){
                $getData[0] = preg_replace('/[[:^print:]]/', '', $getData[0]);//Remove espaço em branco do campo
                $sql = "INSERT into alunos (matricula, nome, disciplina) 
                values ('".$getData[0]."', '".$getData[1]."', '".$disciplina."')";                
                $link->query($sql);     

                $cadastraAlunoComoUsuario = "INSERT into usuario (matricula, senha, permissao)
                values ('".$getData[0]."', '". $getData[0] ."', 1 )";
                $link->query($cadastraAlunoComoUsuario);
                // print_r($sql);
            }     
         }
        
         fclose($file);	
     }
     mysqli_close($link);
     header('location:../view/sucesso.php');
}
else{ header('location:../view/aluno.php'); }
?>