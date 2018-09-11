<?php 

  require 'config.php';
  require 'connection.php';

  $matricula = $_POST['matricula'];
  $senha = $_POST['senha'];

  $link = DBConnect();

  if ($result = mysqli_query($link, "SELECT * FROM usuario WHERE matricula = $matricula AND senha = '$senha'")) {
    if(mysqli_num_rows($result) >= 1)  
    {
      $row = $result->fetch_assoc();
      session_start();
      $_SESSION['matricula'] = $matricula;
      $_SESSION['senha'] = $senha;
      $_SESSION['permissao'] = $row['permissao'];
      mysqli_close($link);
      if($matricula != $senha)
      echo 1;
      else
      echo 2;
    } else {
      if(empty($cpf) && empty($matricula))
        echo "Por Favor Preencher Senha e CPF"; 
      elseif (empty($matricula)) {
        echo "Por Favor Preencher a matricula.";
      }elseif (empty($senha)) {
        echo "Por Favor Preencher a Senha.";
      }else{
        echo "Confira os Dados Informados";
      }
    }    
  }
?>
