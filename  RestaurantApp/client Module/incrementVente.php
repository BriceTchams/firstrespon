<?php

session_start();
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