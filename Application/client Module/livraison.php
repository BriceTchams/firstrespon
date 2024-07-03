<?php 
 
 require('../config.php');
 $conn = connect();
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
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
    <script src="../datatables  library/sweetAlertMin.js"></script>

    <link rel="stylesheet" href="../select2-4.1.0-rc.0/dist/css/select2.min.css">
<script src="../select2-4.1.0-rc.0/dist/js/select2.min.js"></script>




   
 </head>
<body>

    <div class="container-fluid">
        <?php  require('navBArSimple.php');

if (isset($_GET['livraison'])) {
    echo"
        <script>
        swal({
            title: 'Bon de livraison edité avec succès',
            icon : 'success',
            button : 'Ok'
         });
    </script>";
        }

        
        
          ?>

        <!-- Barre Laterale -->

        <div class="row ligneSide" >
            <?php   require('sideBar.php'); ?>

            <!-- interface de Discussions avec les administrateurs des differents restaurnts -->
            <div class="col-sm-10 col-md-10 sdBig" >
            <!-- style="background-image:url(../image/BackAcceuiil.PNG);  background-repeat: no-repeat;
            background-size:100% 100%;" -->

               
                 <div class="card mt-5" style=" width:70%; margin-left:15%; border-radius:11px; " >
                    <div class="card-header">  <div class="bg-light mt-2 text-center" style="height: 50px; width:100%; border-radius:10px;">
                                <strong><h2 class="my-3 mx-4">Editer un bon de livraison</h2></strong>
                  </div>
                 <div class="card-body">
                    <form action="./ajouterLivraison.php" class="form  text-center" Method="POST" style="width:70%; margin-left:15%; border-radius:20px; "  enctype="multipart/form-data">
                                    <!-- <p class="mt-4 h3 text-center"> </p> -->
                       


                        <div class="form-floating mt-4">
                        <input type="number" class="form-control " name= "montant" required id="montant" placeholder="montant" style="border-radius: 70px; background-color: rgb(217, 217, 217);">
                        <label for="montant">Montant</label>
                        </div>

                        
                       

                        <?php   
                        // recuperation de l'email du restaurant  
                         $email = $_SESSION['email'];

                        $r = mysqli_fetch_array(mysqli_query($conn , "SELECT id_restau FROM Restaurant  WHERE email= '$email'"));
                        $idrestau = $r[0];

                        ?>
                        
                        <?php 
                        $dt = date('y-m-d');
                        // requette qui selectionne les clients d'un restaurant specique 
                        $sql="SELECT DISTINCT cm.id_com,l.id_com, r.id_restau,  r.nom as rnom, cm.date_com as datecom , c.prenom as cprenom ,  r.ville as rville, r.telephone as rphone, c.nom as cnom ,c.ville as cville  FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm
                        WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                        p.id_restau = r.id_restau AND p.id_restau='$idrestau' AND cm.date_com = '$dt'";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer = mysqli_query($conn , $sql);
                        // var_dump($answer);
                        ?>
                         <div class="form-floating mt-4">
                        <input type="hidden" class="form-control " name= "idrestau" required id="" placeholder="Objet" style="border-radius: 70px; background-color: rgb(217, 217, 217);" value="<?= $r[0]?>">
                        <label for=""></label>
                        </div>
            
                    <!-- deuxieme input  -->
                      
                        <select name="idcom" id="nom" class="form-control select2-" style="border-radius: 70px; background-color: rgb(217, 217, 217); height:70px;"
                        data-tags="true" data-placeholder="numero de la commande" data-allow-clear="true">
                            <?php while($ligne = mysqli_fetch_assoc($answer)){ ?>
                                <option value="<?= $ligne['id_com']?>"><?= $ligne['id_com']?> </option>

                            <?php }?>
                        </select>

                        

            
                        <input type="submit" value="Envoyer" name = "Envoyer"
                            class="  bg-dark h4 form-control text-center mt-4 text-white " style="width: 50%; border-radius:60px ; margin-left: 25%; background-color: rgb(2, 156, 177); height: 65px; box-shadow:2px 0px 1px 0px;">

                        
                        </form>
                </div>

        </div>




    </div>
    
    
    <script>
        $(document).ready(function () {
            $('#nom').select2();
        });
    </script>

 
</body>
</html>