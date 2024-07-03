<?php

   session_start();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
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

    <!-- importation de la librairie sweetalert -->

    <script src="./datatables  library/sweetAlertMin.js"></script>

    <link rel="stylesheet" href="./leaflet.css">
	<script src="./leaflet.js"></script>
  <script src="./sweetAlertMin.js"></script>
   
  <?php
// if (isset($_GET['sweet'])) { ?>
  
  

<!-- <?php ?> -->
        
    
         

    <script >

      
           function dialogue(){
              //     swal({
              //     title: "insertion reussite",
              //                       timer: 1000,

              //     icon : "success",
                 
              // })
              alert("ajout du plat reussi");
          }

           
    </script>

    
<script src="./datatables  library/jquery-3.7.1.js"></script>
<script>
      $(document).ready(function () {
        $('.affiche').click(function () { 
          // e.preventDefault();
          $('#cadre').toggle();
          
        });
      });

      // function show() {
      //   document.getElementById('cadre').style="display:none";
        
      // }

      
    </script>

   

    <!-- <script src="./autoComplete.js"></script> -->
    <script src="./file.js" ></script>
 


    <style>
      
    </style>

</head>
<body >
<!-- <button type="button" class="btn btn-primary" id="liveToastBtn">show toast</button>
  <div class="toast-container position-fixed bottom-o end-0 p-3">
   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="liveToastBtn">
    <div class="toast-header">
      <p class="text-danger"> error</p>
      <button type ="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <p>good</p>
    </div>
   </div>
   
  </div> -->
<?php
  if (isset($_GET['sweet'])) {
    echo"
    
        <script>
        swal({
            title: 'email ou mot de passe incorrect',
            icon : 'warning'         });
    </script>";
        }

        
        
          ?>

  <div class="container-fluid">
         <!-- barre de navigation -->
         <?php require ('navbar.php') ; 
       ?>
       <!-- <p id="cadre">bonjour bonjour</p> -->
        <br><br>
             
        
          <div class="row">
            <div class="col-md-12 col-sm-12 col-8 carousel-responsive">
               <?php require('./client Module/carrousel.php')?>

              </div>

              <?php             

              require('config.php');
              $conn = connect();

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

              // Date du jour 
              $date = date('y-m-d');
              // echo$date;AND p.date_post ='$date'
              $requette1 = "SELECT DISTINCT r.id_restau , r.url , r.nom , r.ville,r.longitude , r.latitude FROM restaurant r , plat p
              
              WHERE p.id_restau = r.id_restau  order by id_restau";
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

                            <img src="./image/<?= $ligne['url']?>" alt="Poulet Dg" width="9%"  style=" border-radius: 100%;" class="mx-3 border-2">

                            <div class="mx-1">
                                 <h4 style="font-family: Open Sans;" class="mt-3"> <strong><?= $ligne['nom']?></strong></h4>
                                <p  style="font-family: Open Sans;" class="mt-1 "><?= $ligne['ville']?></p>   
                            </div>

                            
                            <div class="d-flex mt-3" style="margin-left: 10%;" >
                               <!-- <i class="fa fa-ellipsis fa-3x  " style="margin-bottom:40%;"></i> -->

                               <!-- boutton de location de chaque restaurant  -->
                               
                              <!-- </a> -->
                                <!-- <h5 class="">Localisation </h5>  -->
                            <?php
                            // $_SESSION['long'] =;
                            // $_SESSION['lat'] =  $ligne['latitude'];
                            // $_SESSION['nom'] =  $ligne['nom'];


                        ?>
                            <a href="index.php?lon='<?=  $ligne['longitude']?>' &lat='<?=  $ligne['latitude']?>'&nom='<?=  $ligne['nom']?>'  " ><i class="fa-solid fa-location fa-2x  mx-4 " ></i></a>

                                
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

                    </div>

          </div>
          
        <!-- fin de la premiere ligne  -->
          <div class="col-sm-12 col-md-12">
            <?php require('footer.php')?>
          </div>

          
      <div id="cadre" >
      <?php 

	// $pharmacy =  array(
	// 	array('nom' => 'ste monique','lat' => 10.3270,'long' => 5.4657),
	// 	array('nom' => 'montagne','lat' => 10.3370,'long' => 5.4477),
	// 	array('nom' => 'benin','lat' => 10.3470,'long' => 5.4637),
	// 	array('nom' => 'salvia','lat' => 10.3570,'long' => 5.4277),
	// 	array('nom' => 'binam','lat' => 11.3260,'long' => 5.4177));
//     $lon =$_GET['lon'];
// $lat =$_GET['lat'] ;
// $nom =$_GET['nom'] ;
// echo($nom);
?>

      <!-- <div id="map" style="width: 400px; height: 200px; margin-left: 70px; position:absolute; z-index:300px; top:50%;"></div> -->


      
<!-- <script>

const map = L.map('map').setView([10.3270, 5.4677], 13);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 50,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// const marker = L.marker([10.25, 5.23]).addTo(map)
// 	.bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();
// $lon= $_SESSION['lon'];
//   $lat = $_SESSION['lat'];
<?php $i = 1; 
 
  ?>	
const <?php


// var_dump($lon);


echo 'mark'.$i; ?> = L.marker([10, 10]).addTo(map)
  .bindPopup('<b></b><br />I am a popup.').openPopup();
<?php $i++;  ?>
</script> -->

</div>





  </div>
    


        <!-- modal numero 2 -->
    <?php require('ModalConnexion.php') ; ?>

    <?php



  ?>

      <!-- modal numero 2 -->
      <?php require('ModalInscription.php') ; ?>    

      <div id="rep">


      </div>
 

      <script>
        $(document).ready(function () {
          $('#connect').click(function () { 
            // e.preventDefault();
            var email =  $('#email').val()
            var password = $('#password').val()
          //  alert(email+ password)

            $.ajax({
              type: "POST",
              url: "./Autentification/connexion.php",
              data: {
                email:email,
                password: password
              },
              // dataType: "dataType"
              
              success: function (data) {
                // console.log(reponse);
                // $('#rep').html(data)
                // var reponse = data.JSON()
              //   var content = data.text()
              //  alert(content)

                // alert(reponse)
                window.location.href="./client Side/Acceuil.php";
                
              },
              error:function(error){
                consolo.log(error);
              }

              
            });
            
          });
        });
      </script>
    </body>
</html>
