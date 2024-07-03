<?php
require('../config.php');
$conn = connect();

if(isset($_GET['btnconfirm'])){

   
    extract($_GET);
    echo $pu;
   

        // $iddep= mysqli_fetch_array(mysqli_query($conn, "SELECT id_dep FROM Departement WHERE  name ='$depart'"));


        echo $me2;
        // $id_spe= $_GET['me2'];
         $req2 ="UPDATE plat SET libelle='$nom', pu ='$pu', url_photo='$image' WHERE id_plat='$me2'";

            mysqli_query($conn , $req2);

        header('Location:../client Module/menu.php');
        // var_dump($Resultat);


}
       























?>