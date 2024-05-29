<?php

   session_start();
   
   require('../config.php');
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

    <!-- importation de la librairie sweetalert -->

    <script src="./datatables  library/sweetAlertMin.js"></script>
    

    <script >
      
           function dialogue(){
              //     swal({
              //     title: "insertion reussite",
              //                       timer: 1000,

              //     icon : "success",
                 
              // })
              alert("ajout reussi du plat");
          }

           
    </script>

   

    <script src="./autoComplete.js"></script>
    <script src="./file.js" >

    </script>

</head>
<body>
  <div class="container-fluid">
         <!-- barre de navigation -->
         <?php require ('navbar.php') ; ?>
        <br><br>
                    
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 carousel-responsive">
               <?php require('../client Side/carrousel.php')?>

              </div>

              <?php             

              // require('../config.php');
              // $conn = connect();

              // $requette = "SELECT  *
              // -- nom , libelle , pu , id_plat , url_photo , id_restau
              // FROM Restaurant , Plat 
              
              // WHERE Restaurant.id_restau = Plat.id_restau ";

              // $resultat = mysqli_query($conn , $requette);

              // var_dump($resultat);
              
              
              ?>
              <h4 class="text-left mt-5 mx-4"> <strong>Publications  des Restaurants </strong></h4>
              <div class="col-sm-12 col-12 col-xl-12" id="resultat">

              <?php  

              // ecriture de la requette qui affiche les informations des restaurants ayants effectuer un  post 
              date_default_timezone_set('Africa/Douala');

                // date du jour
              // $date = date('y-m-d');
              
              //  condition dans le where
              // p.date_post ='$date'

              $requette1 = "SELECT DISTINCT r.id_restau , r.url , r.nom , r.ville FROM restaurant r , plat p
              
              WHERE p.id_restau = r.id_restau order by id_restau";
              $resultat = mysqli_query($conn , $requette1);
              // echo($resultat1);
              // var_dump($resultat);



              ?>

            
                <?php  foreach($resultat as $ligne){
                  // $i++;
                  // var_dump($ligne);
                  ?>
                        <!-- debut de l'entente des restaurants -->
                        <div class="d-flex mt-5">
                            <img src="../image/<?= $ligne['url']?>" alt="Poulet Dg" width="9%"  style=" border-radius: 100%;" class="mx-3 border-2">

                            <div class="mx-1">
                                 <h4 style="font-family: Open Sans;" class="mt-3"> <strong><?= $ligne['nom']?></strong></h4>
                                <p  style="font-family: Open Sans;" class="mt-1 "><?= $ligne['ville']?></p>   
                            </div>

                            
                            <div class="d-flex mt-3" style="margin-left: 10%;">
                               <!-- <i class="fa fa-ellipsis fa-3x  " style="margin-bottom:40%;"></i> -->
                                <i class="fa-solid fa-location fa-2x  mx-4 "></i>
                                <!-- <h5 class="">Localisation </h5>  -->
                            </div>

                         
                        </div>
                        <!-- // fin de l'entete -->

                          <div class="row my-4">
                        <?php
                        $id =$ligne['id_restau'];
                        $marequette = "SELECT libelle , pu , url_photo, id_plat FROM restaurant r , plat p
                        WHERE p.id_restau = r.id_restau AND p.id_restau ='$id'AND p.deleted = '0' ";

                        $resultat4 = mysqli_query($conn , $marequette);
                        
                        
                        while ($row2 = mysqli_fetch_assoc($resultat4)) {  
                          ?>
                       
                        
                          <!-- premier de Santa Lucia -->
                              <div class="col-sm-3 col-6 col-md-3">

                                  <div class="card  mt-4" style="box-shadow : 0px 2px 0px 1px;">
                                      <div class="card-header text-center text-white" style="background-color:rgba(128, 128, 128, 0.615);
                          border-radius:1px;" >
                                          <h5><?= $row2['libelle']?></h5>
                                      </div>
                                      <div class="card-body">
                                          <img src="../imagePlat/<?= $row2['url_photo']?>" alt="" width="100%" height="180px" class="img-reponsive">
                                      </div>
                                      <div class="footer" style="background-color:rgba(128, 128, 128, 0.615);
                          ">
                                              <h6 class="text-center">Prix unitaire:<?=$row2['pu'] ?> XAF</h6>
                                          <div class=" my-3  d-flex mx-4 ">

                                            <i class="fa-solid fa-circle-plus  fa-2x"></i>
                                            <a onclick="dialogue()" href="ajouterPanier.php?id=<?= $row2['id_plat']?>" class="page-link mx-2" ><h5 class="text-white"> Ajouter dans le panier</h5></a>
                                          </div>
                                      </div>
                                  </div>
                         
                           
                                    <!-- fin de la deuxieme boucle while -->

                            </div>                                 
                        <?php }?>  



                       
                      </div>
                             <?php }?>

                    </div>

          </div>
          <!-- fin de la ligne -->
          
        <!-- fin de la premiere ligne  -->
          <div class="col-sm-12 col-md-12">
            <?php require('../footer.php')?>
          </div>

  </div>
    


        <!-- modal numero 2 -->
    <?php require('../ModalConnexion.php') ; ?>


      <!-- modal numero 2 -->
      <?php require('../ModalInscription.php') ; ?>    
</body>
</html>
