<?php
require('../config.php');
session_start();
$conn = connect();



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
            <!-- style="background-image:url(../image/BackAcceuiil.PNG);  background-repeat: no-repeat;
            background-size:100% 100%;" -->

              
            

            <?php  
                $mail = $_SESSION['email'];
                $an =mysqli_fetch_array(mysqli_query($conn , "SELECT * from restaurant WHERE 
                email='$mail'
                "));
                // var_dump($an);
                $num_restau=$an[0] ; 
                // echo"$num_restau";
                $dt = date('y-m-d');

             


           ?>
                        <!-- deuxieme ligne -->
                 <div class="row mt-4 ">
                    <div class="col-sm-4 col-4">
                        <div class="card text-white bg-dark" style="box-shadow: 4px 2px 0px  3px;  border-radius:20px;">
                                <div class="card-body text-center" >
                                    <i class="fa-solid fa-truck-fast fa-3x my-3  "style="color:var(--back);"></i>
                                </div>
                                <div class="card-footer  ">
                                    <span class="h5">Livraison(s)</span>  
                                    <span class="  h3 bg-white badge float-end text-dark" style="border-radius: 100%;
                                     position: relative; ">
                                         0
                                </span>
                                </div>
                            </div>
                    </div>
                        
                        
                    <?php 
                     $qry = "SELECT DISTINCT cm.id_com,l.id_com, r.nom as rnom, cm.date_com as datecom , c.prenom as cprenom ,  r.ville as rville, r.telephone as rphone, c.nom as cnom ,c.ville as cville , count(cm.id_com)  FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm 
                     WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                     p.id_restau = r.id_restau AND p.id_restau='$num_restau' AND cm.date_com = '$dt'";
     
                     $answer =mysqli_fetch_array( mysqli_query($conn , $qry));

                    ?>
                        <div class="col-sm-4 col-4">

                        <div class="card text-white bg-dark" style="box-shadow: 4px 2px 0px  3px;  border-radius:20px;">
                                <div class="card-body text-center"  >
                                    <i class="fa-solid fa-cart-shopping fa-3x my-3  "style="color:var(--back);"></i>
                                </div>
                                <div class="card-footer  ">
                                    <span class="h5">Commande(s)</span>  
                                    <span class="  h3 bg-white badge float-end text-dark" style="border-radius: 100%;
                                     position: relative; ">
                                        <?=  $answer[9]?>
                                </span>
                                </div>
                           </div>
                        </div>
                        
                        
                        <div class="col-sm-4 col-4" >

                        <?php 
                         $sql1="SELECT DISTINCT c.id_client ,c.nom , c.prenom FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm
                         WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                         p.id_restau = r.id_restau  AND r.id_restau='$num_restau'";
                         // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                         // r.email= ''";
                         $answer1 = mysqli_fetch_array(mysqli_query($conn , $sql1));
                         ?>
                            <div class="card text-white bg-dark" style="box-shadow: 4px 2px 0px  3px;  border-radius:20px;">
                                <div class="card-body text-center"  >
                                    <i class="fa-solid fa-user fa-3x my-3  "style="color:var(--back);"></i>
                                </div>
                                <div class="card-footer  style="border:none;"">
                                    <span class="h5">Client(s)</span>  
                                    <span class="  h3 bg-white badge float-end text-dark" style="border-radius: 100%;
                                     position: relative; ">
                                         3
                                </span>
                                </div>
                           </div>
                    
                        </div>
                       
                       
                       

                       
                      
                       
                    </div>


                    <!-- cbc -->
                    <div class="row mt-4 ">
                    <div class="col-sm-4 col-4">
                        <div class="card text-white bg-dark" style="box-shadow: 4px 2px 0px  3px; border-radius:20px;">
                                <div class="card-body text-center" >
                                    <i class="fa-solid fa-bell fa-3x my-3  "style="color:var(--back);"></i>
                                </div>
                                <div class="card-footer  ">
                                    <span class="h5">Notification(s) envoyé(es) </span>  
                                    <span class="  h3 bg-white badge float-end text-dark" style="border-radius: 100%;
                                     position: relative; ">
                                         0
                                </span>
                                </div>
                            </div>
                    </div>
                        
                        
                        <div class="col-sm-4 col-4">
                        <?php
                        $sql3="SELECT DISTINCT r.id_restau,count(p.id_plat) FROM plat p , restaurant r , Ligne_commande l  
                        WHERE  p.id_restau = r.id_restau AND r.email='$mail' and p.deleted ='0'AND p.id_restau='$num_restau'";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer3 =mysqli_fetch_array( mysqli_query($conn , $sql3));
                        // var_dump($answer3);
                         ?>
                        <div class="card text-white bg-dark" style="box-shadow: 4px 2px 0px  3px;  border-radius:20px;">
                                <div class="card-body text-center" >
                                    <i class="fa-solid fa-paper-plane  fa-3x my-3  "style="color:var(--back);"></i>
                                </div>
                                <div class="card-footer  ">
                                    <span class="h5">Publication(s)</span>  
                                    <span class="  h3 bg-white badge float-end text-dark" style="border-radius: 100%;
                                     position: relative; ">
                                     <?= $answer3[0]?>

                                     
                                        
                                </span>
                                </div>
                           </div>
                        </div>
                        
                        
                        <div class="col-sm-4 col-4" >
                           
                        </div>
                       
                       
                       

                       
                      
                       
                    </div>
                    </div>


                </div>

            
        </div>



    </div>
    

    
</body>
</html>