<?php 

  require 'config.php';
  require 'connection.php';

  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];

  $link = DBConnect();

   /*
  if ($result = mysqli_query($link, "SELECT * FROM pessoa WHERE cpf = '$cpf' AND senha = '$senha'")) {
      printf("Select returned %d rows.\n", mysqli_num_rows($result));

      mysqli_free_result($result);
  }
  */

  if ($result = mysqli_query($link, "SELECT * FROM pessoa WHERE cpf = '$cpf' AND senha = '$senha'")) {
    if(mysqli_num_rows($result) >= 1)  
    {
      session_start();
      $_SESSION['cpf'] = $cpf;
      $_SESSION['senha'] = $senha;
      mysqli_close($link);
      echo 1;
    } else {
      if(empty($cpf) && empty($senha))
        echo "Por Favor Preencher Senha e CPF"; 
      elseif (empty($cpf)) {
        echo "Por Favor Preencher o CPF.";
      }elseif (empty($senha)) {
        echo "Por Favor Preencher a Senha.";
      }else{
        echo "Dados Informados Não Foram Econtrados";
      }
    }    
  }
?>
