<?php 
require 'config.php';
require 'connection.php';

$cpf = $_POST['cpf-recuperar-senha'];
$datanascimento = strtr($_POST['datanascimento'], '/', '-');
$datanascimento = date('Y-m-d', strtotime($datanascimento));
$email = $_POST['email'];

$link = DBConnect();

/*    if ($result = mysqli_query($link, "SELECT * FROM pessoa WHERE cpf = '$cpf' AND email = '$email' AND datanascimento = '$datanascimento'")) {
      if(mysqli_num_rows($result) >= 1)  
      {

        printf("Encontrou");


		} else {
            
        printf("Não encontrou");
        
        //Mensagem javascript  echo "<script type=\"text/javascript\">alert('Usuário não Encontrado!');</script>";
      }
           

    }*/

    $sql = "SELECT senha FROM pessoa WHERE cpf = '$cpf' AND email = '$email' AND datanascimento = '$datanascimento'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
       $array = $row['senha'];
       $retorno = array('senha' => $array, 'status' => true);
       echo json_encode($retorno);
     }     
   } else {
    if(empty($cpf) || empty($datanascimento) || empty($email))
      $retorno = array('message' => "Por Favor Preencher Todos os campos");
    else
      $retorno = array('message' => "Usuário Não Encontrado");
    echo json_encode($retorno);
  }


  mysqli_close($link);

  ?>