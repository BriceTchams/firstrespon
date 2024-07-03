<?php
require('../config.php');
$conn = connect();

if(isset($_POST['save'])){

     extract($_POST);

     // recuperation de l'image venant du formulaire 

     $dossierTempo = $_FILES['image']['tmp_name'];


     $dossierSite = "../imageclientRestau/".$_FILES['image']['name'];


     $deplacer = move_uploaded_file( $dossierTempo ,   $dossierSite);
    if($deplacer){

        // ecriture de la requette qui insert les information d'un client dans la base de donnees 

        // if($type=="client"){
        //     $image = $_FILES['image']['name'];
        //                      var_dump($image);

        //      $reqinsert = "INSERT INTO  Client( email ,nom  ,prenom , telephone , mot_de_passe , ville , type ,pays,url  )values('$email','$nom','$prenom','$phone','$password','$ville','$type','$pays','$image')";

        //          $resultat= mysqli_query($conn,$reqinsert);



        //         if($resultat){
        //             session_start();
        //             $_SESSION['email']=$email;
        //             $_SESSION['password']=$password;
        //             header('Location:../client Side/Acceuil.php');
        //         }
        // }

            echo"noo";
                    $date = date("y-m-d");
                    $image = $_FILES['image']['name'];

                    $reqinsert1 = "INSERT INTO  restaurant( email ,nom  , telephone , mot_de_passe , ville , type ,pays,date_creation,url  )values('$email','$nom','$phone','$password','$ville','$type','$pays','$date','$image')";
                        $resultat1= mysqli_query($conn, $reqinsert1);
                // var_dump($resultat1);
                        
                if($resultat1){
                    session_start();
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$password;

                    header('Location:./restaurant.php');
                }
         

     } 


}
if(isset($_POST['soumettre'])){

    extract($_POST);

    // recuperation de l'image venant du formulaire 

    $dossierTempo = $_FILES['image']['tmp_name'];


    $dossierSite = "../imageclientRestau/".$_FILES['image']['name'];


    $deplacer = move_uploaded_file( $dossierTempo ,   $dossierSite);
   if($deplacer){

       // ecriture de la requette qui insert les information d'un client dans la base de donnees 

       // if($type=="client"){
           $image = $_FILES['image']['name'];
                            var_dump($image);

            $reqinsert = "INSERT INTO  Client( email ,nom  ,prenom , telephone , mot_de_passe , ville , type ,pays,url  )values('$email','$nom','$prenom','$phone','$password','$ville','$type','$pays','$image')";

                $resultat= mysqli_query($conn,$reqinsert);



               if($resultat){
                   session_start();
                   $_SESSION['email']=$email;
                   $_SESSION['password']=$password;
                   header('Location:./client.php');
               }
       // }


    } 


}

if(isset($_POST['soumettre'])){

    extract($_POST);

    // recuperation de l'image venant du formulaire 

    $dossierTempo = $_FILES['image']['tmp_name'];


    $dossierSite = "../imageclientRestau/".$_FILES['image']['name'];


    $deplacer = move_uploaded_file( $dossierTempo ,   $dossierSite);
   if($deplacer){

       // ecriture de la requette qui insert les information d'un client dans la base de donnees 

       // if($type=="client"){
           $image = $_FILES['image']['name'];
                            var_dump($image);

            $reqinsert = "INSERT INTO  Client( email ,nom  ,prenom , telephone , mot_de_passe , ville , type ,pays,url  )values('$email','$nom','$prenom','$phone','$password','$ville','$type','$pays','$image')";

                $resultat= mysqli_query($conn,$reqinsert);



               if($resultat){
                   session_start();
                   $_SESSION['email']=$email;
                   $_SESSION['password']=$password;
                   header('Location:./client.php');
               }
       // }


    } 


}
if(isset($_POST['valider'])){

    extract($_POST);

          $login =  bin2hex(random_bytes(10));
        //   echo($password);
        //   $pass =bindec(random(6));
          
          
         echo($pass );

            $reqinsert = "INSERT INTO  admin( login, password) values('$login' , '$password')";

                $resultat= mysqli_query($conn,$reqinsert);



               if($resultat){
                  
                   header('Location:./admin.php');
               }
       // }




}











?>