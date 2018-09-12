<?php
require '../view/config.php';
require '../view/connection.php';
$link = DBConnect();

if(isset($_POST["import"])){
    $filename=$_FILES["file"]["tmp_name"];	

     if($_FILES["file"]["size"] > 0)
     {
         
          $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
         {
            // print_r($getData);
            if($getData[0] != 0){
                $sql = "INSERT into alunos (matricula, nome) 
                values ('" . $getData[0] . "', '" . $getData[1] . "')";
                print_r($sql);
                $link->query($sql);       
            }     
         }
        
         fclose($file);	
     }
}	 
mysqli_close($link);
?>