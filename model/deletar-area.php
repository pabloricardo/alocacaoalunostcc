<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();
    
    $id_area = $_POST['id_area'];

    $link = DBConnect();
    
    $sql = "DELETE FROM area WHERE id_area = $id_area";
    $link->query($sql);
    //echo($sql);
	mysqli_close($link);
?>