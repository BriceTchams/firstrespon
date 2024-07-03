
<?php

require('./config.php');
$conn = connect();
session_start();
if(isset($_POST['input']) AND !empty($_POST['input'])){ 
    $input = $_POST['input']; ?>

<?php  


// ecriture de la requette qui affiche les informations des restaurants ayants effectuer un  post 
$date = date('y-m-d');
// echo$date;
// $requette1 = "SELECT DISTINCT r.id_restau , r.url , r.nom , r.ville FROM restaurant r , plat p

// WHERE p.id_restau = r.id_restau AND r.nom='$input'";


$marequette = "SELECT DISTINCT r.id_restau , r.url , r.nom , r.ville , p.libelle , p.pu , p.url_photo, p.id_plat FROM restaurant r , plat p
WHERE p.id_restau = r.id_restau  AND p.deleted='0' AND p.libelle='$input'  ";

$resultat = mysqli_query($conn , $marequette);

// echo($resultat1);
// var_dump($resultat);



?>


  <?php  foreach($resultat as $ligne){
    // $i++;
    // var_dump($ligne);
    ?>
          <!-- debut de l'entente des restaurants -->
          <div class="d-flex mt-5">
              <img src="./image/<?= $ligne['url']?>" alt="Poulet Dg" width="9%"  style=" border-radius: 100%;" class="mx-3 border-2">

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
          WHERE p.id_restau = r.id_restau AND p.id_restau ='$id' AND p.deleted='0'";

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
                            <img src="./imagePlat/<?= $row2['url_photo']?>" alt="" width="100%" height="180px" class="img-reponsive">
                        </div>
                        <div class="footer" style="background-color:rgba(128, 128, 128, 0.615);
            ">
                                <h6 class="text-center">Prix unitaire:<?=$row2['pu'] ?> XAF</h6>
                            <div class=" my-3  d-flex mx-4 ">

                              <i class="fa-solid fa-circle-plus  fa-2x"></i>
                              <a onclick="dialogue()" href="ajouterPanierV.php?id=<?= $row2['id_plat']?>" class="page-link mx-2" ><h5 class="text-white"> Ajouter dans le panier</h5></a>
                            </div>
                        </div>
                    </div>
           
             
                      <!-- fin de la deuxieme boucle while -->

              </div>                                 
          <?php }?>  



         
        </div>
               <?php }?>

               <?php }?>