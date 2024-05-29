

<?php
require('../config.php');
$conn = connect();

  if( isset($_POST['btndelete']) & isset($_POST['id_del'])){
    extract($_POST);



      $req = "UPDATE plat SET deleted= 1 WHERE id_plat =$id_del ";
      $reponse = mysqli_query($conn, $req);

      if($reponse){
        header("Location:./menu.php?nomdel='bien");
      }
      else{
        die("erreur");
      }
   }

?> 























