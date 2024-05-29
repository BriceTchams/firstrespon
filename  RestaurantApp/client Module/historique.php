<?php

require('../config.php');
session_start();

$conn =connect();
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
    <link rel="stylesheet" href="./datatables  library/jquery/jquery-ui.css">
    <script src="../datatables  library/jquery/jquery-ui.js"></script>

    <script src="../autoComplete.js"></script>
    <script src="../file.js"></script>

</head>
<body>

    <div class="container-fluid">

        <?php
        require('navBarSimple.php');
        ?>
        <!-- Barre Laterale -->

        <div class="row ligneSide" >
            <?php require('sideBar.php'); ?>

            <div class="col-sm-10 col-md-10 sdBig" style="background-color: rgba(249, 243, 243, 0.805);">

                <div class="row ">
                    <div class="col-md-12 col-sm-12">

                        <div class="  mt-4 text-white bg-dark " style=" border-radius: 7px; display: inline-flex; width: 100%; height: 70%;">
                            <h4 class="mx-4 mt-1">Historique  de vos Commandes</h4>
    
    
                        </div>
                    </div>

                       
                </div>
                <?php  
                $mail = $_SESSION['email'];
                $an =mysqli_fetch_array(mysqli_query($conn , "SELECT * from restaurant WHERE 
                email='$mail'
                "));
                // var_dump($an);
                $num_restau=$an[0] ; 
                // echo"$num_restau";
                $dt = date('y-m-d');

                $qry = "SELECT DISTINCT cm.id_com,l.id_com, r.nom as rnom, cm.date_com as datecom , c.prenom as cprenom ,  r.ville as rville, r.telephone as rphone, c.nom as cnom ,c.ville as cville  FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm
                WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                p.id_restau = r.id_restau AND p.id_restau='$num_restau' AND cm.date_com = '$dt'";

                $answer = mysqli_query($conn , $qry);
                // var_dump($answer);
                    // $VAL = mysqli_num_rows(mysqli_query($conn , $qry));
                // echo($VAL);


           ?>

                <div class="row  mx-2">
                    <div class="col-md-12 col-sm-12">

                        <!-- premiere carte -->
                        <?php while($ligne = mysqli_fetch_assoc($answer)) { ?>
                      <div class="card mt-5">
                        <!-- entete du bon de commande -->
                            <div class="card-header text-white" style="background-color: var(--ActiveColor); ">
                              <div class="row my-2">
                                <div class="col-sm-6 text-center">
                                    <h4 class=""><?= $ligne['rnom']?> </h4>
                                    <h5 class=""> <?= $ligne['rville']?> </h5>
                                    <h5 class=""> Téléphone : <?= $ligne['rphone']?> </h5>



                                </div>
                                <div class="col-sm-6 text-center">
                                    <!-- <h5 >Commande numéro : 1</h5> -->
                                    <h5>Date:  <?= $ligne['datecom']?> 

                                    </h5>
                                    <!-- <h5>Heure: 7h 30 </h5> -->
                                    <h5>Nom du client : <?= $ligne['cnom']?>  <?= $ligne['cprenom']?></h5>
                                    <h5>Ville:   <?= $ligne['cville']?></h5>



                            

                                </div>
                              </div>

                            </div>
                       
                            <div class="card-body ">
                                <div class="row table-responsive">
                                    <div class="col-sm-11 col-md-11 col-11 text-center">
                                        <table class="table table-bordered text-center "  style="margin-left: 4%;
                                     ">

                                            <thead style="border-radius: 10px;">
                                                <tr > 
                                                    <th>Numero</th>
                                                    <th>Nom du plat</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Quantité</th>
                                                    <th>Prix Total</th>
                                                

                                                    
            
                                                </tr>
                                            </thead>

                                        <?php
                                            $idcom =$ligne['id_com'];
                                            
                                            // var_dump($idcom);
                                            $requette2 = "SELECT l.id_com, l.id_ligne ,p.libelle, p.pu , l.quantite FROM client c ,commande cm , ligne_commande l, plat p, restaurant r WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                                            p.id_restau = r.id_restau and l.id_com='$idcom'";

                                            $resu4 = mysqli_query($conn , $requette2);
                                            $totaux=0;


                                            $i=0;
                                            // var_dump($resu4);

                                            

                                       



                                                ?> 

                                            <tbody> 
                                                <?php   while($ligne4= mysqli_fetch_assoc($resu4)) {
                                                    $totaux += $ligne4['quantite'] *  $ligne4['pu'];
                                            $i++; ?>
                                                <tr>
                                                    <td><?= $i?></td>
                                                    <td><?= $ligne4['libelle']?> </td>
                                                    <td><?= $ligne4['pu']?></td>
                                                    <td><?= $ligne4['quantite']?></td>
                                                    <td><?= $ligne4['quantite'] *  $ligne4['pu']?></td>
                                                </tr>
                                                <?php  }?>
                            
                                               
                                            </tbody>
            
                                        </table>
                                    </div>

                                </div>
                              

                                <div class="float-end d-flex">
                                 <span>TOTAUX</span><h4 class="mx-3"><?php echo$totaux; ?>XAF</h4>
                              </div> 
                            </div>

                      </div>

                      <div><a href="FactureF.php?id_com=<?= $idcom?>" class="page-link float-end mt-2 text-white bg-dark " style="border-radius:10px;"><i class=""></i>
                      <h5 class="mx-3">Télécharger la facture </h5></a> </div>
                     <?php  }?>
                           
                    </div>
                    </div>

                       
                </div>



                

            </div>

        </div>

        <!-- pied de page -->





















    </div>
    




























    
</body>
</html>