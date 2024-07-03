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

        $(document).ready(function () {
            $('#monboutton').click(function () { 
                $('.formulaire').hide();
                
            });
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

                            
                                <H3 class="text-center mt-4 mb-3"> <strong>LISTE DES ADMINISTRATEURS</strong>  </H3>
                                
                                <button class="btn   my-4 bg-dark text-white mx-5 " style="
                                height: 60px; border-radius: 15px; width: 25%; " data-bs-toggle="modal" data-bs-target="#myModal1"><h5>Ajouter un administrateur</h5> </button>
                            <br>
                            </div>
                                
                            <div class="row"> 
                                                               
                                <hr class="border-3">

                            <div class="col-sm-12 table-responsive">
                           
                            <!-- class=" table-striped table table-bordered mt-4" style="margin-left: 25px; width: 95%;" -->
                                <table   id="maTable" class=" table table-striped table-bordered table-responsive"  style="width: 100%;  " >
                                    <thead class="border-1 ">
                                        <tr class="">
                                                <th class="text-center">LOGIN</th>
                                                
                                                <th class="text-center" ><strong >Mot de passe</strong></th>

                                                <th class="text-center" >Deleted</th>






                                            <th class="text-center"><strong>ACTION</strong></th>
                                        </tr>  
                                    </thead>
                                    <?php   
                        // recuperation de l'email du restaurant  
                        //  $email = $_SESSION['email'];

                        // $r = mysqli_fetch_array(mysqli_query($conn , "SELECT id_restau FROM Restaurant  WHERE email= '$email'"));
                        // $idrestau = $r[0];

                        ?>
                        
                        <?php 
                        // requette qui selectionne les clients d'un restaurant specique 
                        $sql="SELECT DISTINCT * FROM Admin ";
                        $answer = mysqli_query($conn , $sql);
                        // var_dump($answer);
                        ?>
                                
                                <tbody class="border-1">
                                    <?php foreach($answer as $ligne) {?>

                                    <tr class="text-center"  >
                                        <td class="text-center" ><?= $ligne['login']?></td>
                                        
                                        <td class="text-center" ><?= $ligne['password']?></td>

                                        <td class="text-center"  ><?= $ligne['deleted']?></td>


                                        <td class="text-center" >
                                          
                                            <form action="" method="post">
                                            <input type="hidden" value="<?= $ligne['id_Admin'] ?>" 
                                                name="idadmin">

                                                <button type="submit" class="mx-4" name="btnmodif">  <i class="fa-solid fa-pen-to-square text-dark "> </i>
                                                    </button>
                                            
                                            </form>

                                        </td>
                                    </tr>
                                    <?php } ?>


                                    </tbody>
                            
                            </table>

                           

                            </div>

                            </div>

                            </div>



               </div>

            
        </div>

        <?php

if(isset($_POST['btnmodif'])){


    $id = $_POST['idadmin'];

    $row = mysqli_fetch_assoc(mysqli_query($conn , "SELECT DISTINCT * FROM Admin WHERE id_Admin = '$id'"));

    // var_dump($row);

                            ?>
<form action="./editclient.php" class="form mx-3 formulaire " method = "post" enctype="multipart/form-data" style="width:40%; z-index:1000; position:absolute; top:20%; background-color:grey;border-radius :14px; left:37%;" 
>

          <input type="hidden" value="<?= $row['id_Admin']?>" name="id">      
<div class="form-floating mt-4">
    <input type="text" class="form-control" id="nom" placeholder="login" style="border-radius: 70px; background-color: rgb(217, 217, 217);"
    name ="login" required value="<?= $row['login']?>">
    <label for="nom">login</label>
  </div>



  <!-- <div class="form-floating mt-3">
    <input type="text" name="type" class="form-control" id="type" placeholder="type" style="border-radius: 70px; background-color: rgb(217, 217, 217);" value="client" read-only>
    <label for="type">type</label>
</div> -->


 <div class="form-floating mt-3">
    <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required value="<?= $row['password']?>">
    <label for="floatingPassword">Mot de passe</label>
</div>

<div class="form-floating mt-3">
    <input type="number" name="deleted" class="form-control" id="del" placeholder="deleted" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required value="<?= $row['deleted']?>">
    <label for="del">deleted</label>
</div>



    <!-- <button type ="submit" class=" bg-dark  form-control text-center my-4 text-white" style="width: 70%; border-radius:60px ; margin-left: 15%;  height: 60px;  "> Creer un compte</button> -->

    <div class="d-flex my-4" style="margin-left:30%;" >
 <button type="button" id="monboutton" class="bg-danger from-control"style="width: 20%; border-radius:60px ;  background-color: rgb(2, 156, 177); height: 50px;">Annuler</button>

   <input type="submit" value="Modifier" name = "valider1"
  class="  bg-dark  form-control text-center  text-white mx-3" style="width: 30%; border-radius:60px ; background-color: rgb(2, 156, 177); height: 50px;">

    </div>
   
</form> 

            







 <?php }?>






    </div>
    <?php       require('./FormAdmin.php'); ?>


    
</body>
</html>