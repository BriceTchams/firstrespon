<?php
require('../config.php');
$conn = connect();
if(isset($_POST['btndelete'])){
    extract($_POST);

        var_dump($_POST);
    $requette = "UPDATE client Set deleted =1 Where id_client =$idclient ";

   if( $conn->query($requette)){
    header('location: client.php');
   }

    
}

if(isset($_POST['btndelete1'])){
    extract($_POST);

        var_dump($_POST);
    $requette = "UPDATE restaurant Set deleted =1 Where id_restau='$idrestau' ";

   if( $conn->query($requette)){
    header('location: restaurant.php');
   }

    
}











?>