<?php

require('../config.php');
$conn = connect ();
   date_default_timezone_set('Africa/Douala');

if(isset($_POST['Envoyer'])){
    // definition du fuseau horaire du cameroun
    extract($_POST);
    var_dump($_POST);

    // fonction date  time
    
    // $date = date("Y-m-d H:i:sa");
       $date = date("Y-m-d");



    // $requette = "INSERT INTO Notification(objet) values('$objet')";
    // $resultat = mysqli_query($conn , $requette);
    // // RECUPERATION DE L'ID DE LA NOTIFICATION 
    // $idNotif = mysqli_fetch_array(mysqli_query($conn , "SELECT max(id_notif) from notification"));
    // $idnotif = $idNotif[0];
        $requette1 = "INSERT INTO Livraison(date_liv , Montant , id_restau , id_com) values('$date' ,'$montant','$idrestau' , '$idcom')";

        $resultat1 =mysqli_query($conn , $requette1);
        if($resultat1){
            header("Location:./livraison.php?livraison=bien");
        }





    // INSERT INTO 
    // var_dump($_POST);
    // var_dump($date);



}





?>