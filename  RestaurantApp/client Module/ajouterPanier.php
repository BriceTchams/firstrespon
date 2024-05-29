

<?php 


 require('../config.php');
   $conn = connect();
 // verifier si une session existe 
 if(!isset($_SESSION)){
    // comme la session n'existe pas on demarre une nouvelle session
    session_start();
 }

 // creation d'une nouvelle variable de session dans laquelle on met un tableau vide 

 if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
 }

// recuperation du produit a ajputer dans le panier 

 if(isset($_POST['id'])){ // si les id ont ete envoyes alors 

    $id = $_POST['id'];

    // verifier grace a id sur le produit existe deja 

   

    $requette = mysqli_query($conn , "SELECT * FROM Plat  where id_plat= $id");
   //  var_dump($requette);
    if(empty(mysqli_fetch_assoc($requette))){
      die("ce produit n'existe pas");
    }
    if(isset($_SESSION['panier'][$id] )){
        $_SESSION['panier'][$id] ++; //ajout de la quanite
      header('Location:./vente.php');
// var_dump($_SESSION['panier']);
        
    }
    else{
      // si non ajoute le produit 
      $_SESSION['panier'][$id] =1;
      header('Location:./vente.php');

      // echo("le produit a ete bien ajouter");
      // var_dump($_SESSION['panier']);
    }
    // unset($_SESSION['panier']);
    // var_dump($id);
 }












?>






















