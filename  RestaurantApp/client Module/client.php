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
    <link rel="stylesheet" href="../datatables  library/dataTables/dataTables.dataTables.min.css">
    <script src="../datatables  library/dataTables/dataTables.min.js"></script>

    <script>
        $(function(){ $("#accordion").accordion( {active:true,
      collapsible: true});
        $('#datepicker').datepicker();
            $('#maTable').DataTable()
            
        });
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

              

                 <div class="row " style="margin-top:5%;">
                                            <div class="cadre">

                                            
                            <div class="row " >

                            
                                <H3 class="text-center mt-4 mb-3"> <strong>LISTE DES CLIENTS</strong>  </H3>
                            </div>

                            <div class="row">                                
                                <hr class="border-3">

                            <div class="col-sm-12 table-responsive">
                           
                            <!-- class=" table-striped table table-bordered mt-4" style="margin-left: 25px; width: 95%;" -->
                                <table   id="maTable" class=" table table-striped table-bordered table-responsive"  style="width: 100%;  " >
                                    <thead class="border-1 ">
                                        <tr class="">
                                                <th class="text-center">NOM</th>
                                                <th class="text-center" ><strong>PRENOM</strong></th>
                                                <th class="text-center" ><strong>TELEPHONE </strong></th>
                                                <th class="text-center" ><strong>VILLE </strong></th>
                                                <th class="text-center" ><strong class="text-center">Pays</strong></th>



                                            <th class="text-center"><strong>ACTION</strong></th>
                                        </tr>  
                                    </thead>
                                    <?php   
                        // recuperation de l'email du restaurant  
                         $email = $_SESSION['email'];

                        $r = mysqli_fetch_array(mysqli_query($conn , "SELECT id_restau FROM Restaurant  WHERE email= '$email'"));
                        $idrestau = $r[0];

                        ?>
                        
                        <?php 
                        // requette qui selectionne les clients d'un restaurant specique 
                        $sql="SELECT DISTINCT c.id_client ,c.nom ,c.telephone,  c.prenom , c.ville , c.pays FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm
                        WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
                        p.id_restau = r.id_restau AND r.email='$email'";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer = mysqli_query($conn , $sql);
                        // var_dump($answer);
                        ?>
                                
                                <tbody class="border-1">
                                    <?php foreach($answer as $ligne) {?>

                                    <tr class="text-center"  >
                                        <td><?= $ligne['nom']?></td>
                                        <td><?= $ligne['prenom']?></td>
                                        <td><?= $ligne['telephone']?></td>
                                        <td><?= $ligne['ville']?></td>
                                        <td><?= $ligne['pays']?></td>
                                        <td class="d-flex">
                                            
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $ligne['id_client'] ?>" >
                                               
                                                <button type="submit" class="" name="btndelete"> <i class="fa-solid fa-trash-can text-danger "> </i> 
                                                    </button>
                                            
                                            </form> 

                                            <form action="" method="post">
                                     

                                                <button type="submit" class="mx-4" name="">  <i class="fa-solid fa-pen-to-square text-dark "> </i>
                                                    </button>
                                            
                                            </form>

                                        </td>
                                    </tr>
                                    <?php } ?>


                                    </tbody>
                            
                            </table>

                                <button class="btn  float-end my-4 bg-dark text-white" style="
                                height: 60px; border-radius: 15px; " data-bs-toggle="modal" data-bs-target="#myModal1"><h5>Ajouter un client</h5> </button>
                            <br>

                            </div>

                            </div>

                            </div>



               </div>

            
        </div>



    </div>
    <?php       require('./FormClient.php'); ?>


    
</body>
</html>