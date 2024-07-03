<?php
require('../config.php');
$conn = connect();

if(isset($_POST['soumettre'])){
    // var_dump($_POST);
    extract($_POST);

    $requette = "UPDATE client SET nom ='$nom' , prenom='$prenom' , email = '$email', mot_de_passe='$password' , pays='$pays' , deleted='$deleted' , ville = '$ville' , telephone ='$phone' , email = '$email' WHERE id_client = '$id'";

    
    if($conn->query($requette)){
        header('location: ./client.php');
    }


}

if(isset($_POST['soumettre1'])){
    // var_dump($_POST);
    extract($_POST);

    $requette = "UPDATE restaurant SET url='$image' , nom ='$nom' , email = '$email', mot_de_passe='$password' , pays='$pays' , deleted='$deleted' , ville = '$ville' , telephone ='$phone' , email = '$email' WHERE id_restau = '$id'";

    
    if($conn->query($requette)){
        header('location: ./restaurant.php');
    }


}


if(isset($_POST['valider1'])){
    // var_dump($_POST);
    extract($_POST);

    $requette = "UPDATE admin SET login ='$login' , password='$password' , deleted='$deleted'  WHERE id_admin = '$id'";

    
    if($conn->query($requette)){
        header('location: ./admin.php');
    }


}








?>