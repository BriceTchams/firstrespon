<?php
require('../config.php');
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
      <!-- importation de la librairie font AweSome -->
      <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
      <script src="../vendor/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../style.css">
      <!-- importation de la librairie bootstrap -->
      <link rel="stylesheet" href="../vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css">
      <script src="../vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

        <!-- jquery library -->
    <script src="../datatables  library/jquery-3.7.1.js"></script>
    <!-- <link rel="stylesheet" href="./datatables  library/jquery/jquery-ui.css"> -->
    <script src="../datatables  library/jquery/jquery-ui.js"></script>

    <script src="../autoComplete.js"></script>
    <script src="../file.js" >
    </script>

<script src="../sweetAlertMin.js"></script>
<link rel="stylesheet" href="../select2-4.1.0-rc.0/dist/css/select2.min.css">
<script src="../select2-4.1.0-rc.0/dist/js/select2.min.js"></script>




  


</head>
<body >

    <div class="container-fluid">

        <?php 
            require('navBarSimple.php');        
        ?>

        <!-- Barre Laterale -->

        <div class="row ligneSide" >
            
        <?php 
            require('sideBar.php');        
        ?>
            <div class="col-sm-10 col-md-10 sdBig" >
                <div class="row">
                    <div class="bg-dark text-white mt-3" style="border-radius:10px; height: 60px; width: 97%; margin-left:1%;">
                                            <h4 class="mt-3">Nouvelle vente </h4>


                    </div>
                </div>

                    <div class="row mt-3">      
                        <div class="col-sm-3 col-3">
                            <?php
                            $dat = date('y-m-d');

                            ?>
                            <div class="d-flex bg-dark text-white " style="border-radius: 14px;"> 
                                <span class="h5 mt-1 mx-3"> Date</span>
                                <input type="text" name="" id="" value="<?= $dat?>" class="mt-1 mx-1" style="width:76%; border-radius:10px; height: 32px;">
                            </div>
                    

                        </div>
                        <div class="col-sm-4 col-4">
                        <?php 
                        // requette qui selectionne les clients d'un restaurant specique 
                        $sql="SELECT DISTINCT r.id_restau,p.*  FROM plat p , restaurant r , Ligne_commande l  
                        WHERE  p.id_restau = r.id_restau AND r.id_restau='$im[0]' and p.deleted ='0'";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer = mysqli_query($conn , $sql);
                        // var_dump($answer);
                        ?>
                        <div class="d-flex bg-dark text-white " style="border-radius: 14px;"> 
                                <span class="h5 mt-1 mx-3"> Plat</span>
                                <select name="" id="plat" class="mt-4 " style="width:73%; border-radius:10px; height: 39px;"  data-tags="true" data-placeholder="plat" data-allow-clear="true">
                                <?php foreach ($answer as $key ) { ?>
                                    
                                    <option value="<?=$key['id_plat'] ?>"> <?= $key['libelle']?></option>
                               <?php }?>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4">
                        <?php 
                        // requette qui selectionne les clients d'un restaurant specique 
                        $sql1="SELECT *  FROM client";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer1 = mysqli_query($conn , $sql1);
                        // var_dump($answer);
                        ?>
                        <div class="d-flex bg-dark text-white " style="border-radius: 14px;"> 
                                <span class="h4 mt-1 mx-3"> Client</span>
                                <select name="" id="client" class="mt-4" style="width:70%; border-radius:10px; height: 39px;"       data-tags="true" data-placeholder="client" data-allow-clear="true">
                                <?php foreach ($answer1 as $key1 ) { ?>
                                    
                                    <option value="<?=$key1['id_client'] ?>"> <?= $key1['nom']?></option>
                               <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-1 col-1">
                            <!-- <div class="bg-dark text-white " style="border-radius: 14px;"> -->
                                    <button class="btn btn-dark mt-2 " id="addcart">OK</button> 
                                <!-- <span class="h5 mt-3 mx-3"> Date</span>
                                <input type="date" name="" id="" class="my-2" style="width:76%; border-radius:10px; height: 39px;"> -->
                            <!-- </div> -->
                    

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        <?php 
                //liste des produits 

                // recuperation des id des produits du paniers verifier si le panier existe d'abord
                if(
                    isset($_SESSION['panier'])
                ){
                    // unset($_SESSION['panier']);
                    // var_dump($_SESSION['panier']);
                   $ids = array_keys($_SESSION['panier']);
                // var_dump($ids); 
                }
                
                
                // il y'a aucune cle dans le panier
                if(empty($ids)){
                    echo("<marquee behavior='scroll' direction='left'><h2>votre panier est vide</h2>
                </marquee>");
                } else{
                    $produits = mysqli_query($conn , "SELECT * FROM Plat WHERE id_plat IN (".implode(',', $ids).")");

                    // var_dump($produits);

                    // liste des produits avec une bouche 
                    $totaux =0;
                // }
                ?>
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead >
                                        <tr class="text-center h5">    
                                            <th>Libelle</th>
                                            <th>Prix unitaire</th>
                                            <th>Quantité</th>
                                            <th> Prix total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php while($row =mysqli_fetch_assoc($produits)){
                                // $row1 =mysqli_num_rows($produits);
                                            // var_dump($row1);
                                        $totaux += $row['pu'] * $_SESSION['panier'][$row['id_plat']]; 

                                        ?>
                                        <tr class="text-center h5">
                                            <td><?= $row['libelle']?></td>
                                            <td><?= $row['pu']?></td>
                                            <td><?=  $_SESSION['panier'][$row['id_plat']] ?></td>
                                            <td><?=  $_SESSION['panier'][$row['id_plat']] *  $row['pu'] ?></td>
                                            <td>
                                            <a href="./vente.php?id2=<?= $row['id_plat']?>" class="">
                                            <i class="fa-solid fa-circle-minus text-dark fa-2x"></i>
                                          </a>
                            
                                        <a href="./vente.php?id1=<?= $row['id_plat']?>" class="">
                                            <i class="fa-solid fa-circle-plus text-dark   fa-2x" ></i>
                                        </a>
                                        <a href="./vente.php?id=<?= $row['id_plat']?>" style="" class=""><i class="fa-solid fa-trash fa-2x text-danger" ></i>   </a>

                                               
                                            </td>
                                        </tr>

                                        <?php }?>
                                        

                                    </tbody>
                                </table>

                            </div>



                        </div>

                       
                    </div>
                    <div class="row">
                        <div class="col-sm-8">

                        </div>

                        <div class="col-sm-4 col-8">
                        <div class="d-flex bg-dark text-white " style="border-radius: 14px;"> 
                                <span class="h5 mt-3 mx-3"> TOTAUX</span>
                                <span type="date" name="" id="" class="my-2 mx-2 bg-white text-dark  h4" style="width:76%; border-radius:10px; height: 39px;"> 
                                <?= $totaux?> XAF
                                </span>
                            </div>
                    
                        </div>



                       
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button class="btn text-white bg-dark text-center mt-5" style="height:40px; border-radius:20px; width:90%;" id="confirm"><h5>Passer ma commande</h5></button>
                        </div>
                        <div class="col-sm-4"></div>

                    </div>

                    <?php }?>



              
            

                


                </div>

            
        </div>



    </div>


    <script>
        $(document).ready(function () {

            $('#addcart').click(function () { 

               var idplat =  $('#plat').val();

               $.ajax({
                method: "POST",
                url: "ajouterPanier.php",
                data: {id: idplat},
                success: function (response) {
                    window.location.href="vente.php";

                    console.log("good");
                    
                }
               });
                
            });

            $('#confirm').click(function () { 
                var idclient =  $('#client').val();
                // $('#sp').hmtl(idclient);
                // alert(idclient);


                $.ajax({
                method: "POST",
                url: "passerCommande.php",
                data: {idclient: idclient},
                success: function (response) {
                    window.location.href="vente.php";
                    // swal({
                    //     title: 'vente effectuee avec succes',
                    //     icon : 'success',
                    //     button : 'Ok'
                    // });
                    // alert("vente effectuee avec succes ")
                    // console.log("good");
                    
                }
               });




                
            });
            $('#client').select2();
            $('#plat').select2();

            
        });
    </script>
    


    
</body>
</html>