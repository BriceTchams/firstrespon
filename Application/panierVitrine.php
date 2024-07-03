<?php



 
 session_start();
 require('config.php');
 $conn = connect();

// suppression d'un element 
 if(isset($_GET['id'])){
    $id= $_GET['id'];
    unset($_SESSION['panier'][$id]);
}

// augmentation de la quantite 
if(isset($_GET['id1'])){
    $i= $_GET['id1'];
    $_SESSION['panier'][$i]++;
}

// dimunition de la quantite 
if(isset($_GET['id2'])){
    $q= $_GET['id2'];
    $_SESSION['panier'][$q] =   $_SESSION['panier'][$q] -1;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
      <!-- importation de la librairie font AweSome -->
      <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
      <script src="../vendor/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="./style.css">
      <!-- importation de la librairie bootstrap -->
      <link rel="stylesheet" href="./vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css">
      <script src="./vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

        <!-- jquery library -->
    <script src="./datatables  library/jquery-3.7.1.js"></script>
    <!-- <link rel="stylesheet" href="./datatables  library/jquery/jquery-ui.css"> -->
    <script src="./datatables  library/jquery/jquery-ui.js"></script>

    <script src="./autoComplete.js"></script>
    <script src="./file.js" >

    </script>

<body>

  <div class="container-fluid">
     <?php require('navBarSimple.php')?>

      <div class="row">
          <?php require('contentPanierVitrine.php')?>

   
          <div class="col-sm-12 col-md-12">
            <?php require('footer.php')?>
          </div>
      </div>
  </div>





  <?php require('ModalConnexion.php') ; ?>    


      <?php require('ModalInscription.php') ; ?>    










    
</body>
</html>