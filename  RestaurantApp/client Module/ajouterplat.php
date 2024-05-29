



<?php 
session_start(); 
  require('../config.php');
  $mail = $_SESSION['email'];
  $pass =$_SESSION['password'];

 

    $conn = connect();
 $requette = "SELECT * from restaurant WHERE email ='$mail' ";
        $resultat = mysqli_query($conn , $requette);
        $id = mysqli_fetch_array($resultat);
        // var_dump($resultat);
        $id_restau = $id[0];
        var_dump($id_restau);
        
        
        ?>

    

<?php
if(isset($_POST['Ajouter'])  ){   

     extract($_POST);


     // copie l'image dans un dossier temporarire en memoire
    $dossierTempo = $_FILES['image']['tmp_name'];

    $dossierSite = "../imagePlat/".$_FILES['image']['name'];

    $deplacer = move_uploaded_file( $dossierTempo ,   $dossierSite);
  
    if($deplacer){
        $date = date('y-m-d');
        // insertion de l'image dans la base de donnee
        $img = $_FILES['image']['name'];
        $resultal = mysqli_query($conn ,"INSERT INTO Plat(url_photo , libelle ,pu ,id_restau , date_post) values('$img' , '$libelle' ,'$pu' , '$id_restau' , '$date')");
        header("Location:menu.php?nom='bien'");

    }


}



?>








