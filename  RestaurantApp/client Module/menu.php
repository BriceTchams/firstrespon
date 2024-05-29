<?php
require('../config.php');

$conn = connect();

session_start();

// if($_GET['nom']){
   

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


<script>
                $(document).ready(function () {
                    $('#monboutton').click(function () { 

                        $('.formulaire').hide();
                    });
                });
            </script>


<link rel="stylesheet" href="../datatables  library/dataTables/dataTables.dataTables.min.css">
    <script src="../datatables  library/dataTables/dataTables.min.js"></script>

<script >
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
            require('./navBarSimple.php');    

            if (isset($_GET['nom'])) {
        echo"
            <script>
            swal({
                title: 'Ajout reussite',
                icon : 'success',
                button : 'Ok'
             });
        </script>";
            }

            if (isset($_GET['nomdel'])) {
                echo"
                    <script>
                    swal({
                        title: 'Suppresion  reussite',
                        icon : 'success',
                        button : 'Ok'
                     });
                </script>";
                    }
            
        // }    
        ?>

        <!-- Barre Laterale -->

        <div class="row ligneSide" >
            
        <?php 
            require('sideBar.php');        
        ?>
            <div class="col-sm-10 col-md-10 sdBig" >
            <!-- style="background-image:url(../image/BackAcceuiil.PNG);  background-repeat: no-repeat;
            background-size:100% 100%;" -->

                <div class="row">

                <div class="col-sm-12 col-md-12" >


                 <div class="card mt-5" style=" width:70%; margin-left:15%;" >
                    <div class="card-header">  <div class="bg-light mt-2 text-center" style="height: 50px; width:100%; border-radius:10px;">
                                <strong><h2 class="my-3 mx-4"> Ajouter un plat</h2></strong>
                  </div>
                 <div class="card-body">
                    <form action="./ajouterplat.php" class="form  text-center" Method="POST" style="width:70%; margin-left:15%; border-radius:20px; "  enctype="multipart/form-data">
                                    <!-- <p class="mt-4 h3 text-center"> </p> -->
                       


                    <div class="form-floating mt-4">
                        <input type="text" class="form-control " name= "libelle" required id="libelle" placeholder="libelle" style="border-radius: 70px; background-color: rgb(217, 217, 217);">
                        <label for="libelle">Libelle</label>
                        </div>
            
                    <!-- deuxieme input  -->
                    <div class="form-floating mt-4">
                        <input type="number" class="form-control" name= "pu" required id="pu" placeholder="prix unitaire" style="border-radius: 70px; background-color: rgb(217, 217, 217);">
                        <label for="pu">prix unitaire</label>
                        
                    </div>
            
                    <!-- deuxieme input  -->
                    <div class="form-floating mt-4">
                        <input type="file" class="form-control" name= "image" required id="image" placeholder="image" style="border-radius: 70px; background-color: rgb(217, 217, 217);">
                        <label for="image">image</label>
                    </div>
            
                    
            
                        <input type="submit" value="Ajouter" name = "Ajouter"
                            class="  bg-dark  form-control text-center mt-4 text-white" style="width: 50%; border-radius:60px ; margin-left: 25%; background-color: rgb(2, 156, 177); height: 65px; box-shadow:2px 0px 1px 0px;">

                        
                        </form>
                   </div>

                 <div class="card-footer"></div>

                
                 </div>

                 

                </div>

    
            

                <div class="row " style="margin-top:5%;">
                                            <div class="cadre">


                            <div class="row " >

                            
                                <H3 id="mont"class="text-center mt-4 mb-3"> <strong>LISTE DES PUBLICATIONS</strong>  </H3>
                            </div>

                            <div class="row">                                
                                <hr class="border-3">

                            <div class="col-sm-12 table-responsive">
                           
                            <!-- class=" table-striped table table-bordered mt-4" style="margin-left: 25px; width: 95%;" -->
                                <table   id="maTable" class=" table table-striped table-bordered table-responsive"  style="width: 100%;  " >
                                    <thead class="border-1 ">
                                        <tr class="">
                                                <th class="text-center">LIBELLE</th>
                                                <th class="text-center" ><strong>PRIX UNITAIRE</strong></th>
                                                <th class="text-center" ><strong>Date de poste</strong></th>

                                                <th class="text-center" ><strong>IMAGE </strong></th>
                                               


                                            <th class="text-center"><strong>ACTIONS</strong></th>
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
                        $sql="SELECT DISTINCT r.id_restau,p.*  FROM plat p , restaurant r , Ligne_commande l  
                        WHERE  p.id_restau = r.id_restau AND r.email='$email' and p.deleted ='0'";
                        // $sql ="SELECT c.id_client , c.nom , c.prenom FROM restaurant r , client c WHERE 
                        // r.email= ''";
                        $answer = mysqli_query($conn , $sql);
                        // var_dump($answer);
                        ?>
                                
                                <tbody class="border-1">
                                    <?php foreach($answer as $ligne) {?>

                                    <tr class="text-center"  >
                                        <td class="text-center"><?= $ligne['libelle']?></td>
                                        <td class="text-center"><?= $ligne['pu']?></td>
                                        <td class="text-center"><?= $ligne['date_post']?></td>

                                        <td class="text-center"><img src="../imagePlat/<?= $ligne['url_photo']?>" alt="" width="150px"  height="70px"></td>
                                        <td class="">
                                            
                                            <form action="./deletePlat.php" method="post">
                                                <input type="hidden" value="<?= $ligne['id_plat'] ?>" name="id_del" >
                                               
                                                <button type="submit" class="" name="btndelete"> <i class="fa-solid fa-trash-can text-danger "> </i> 
                                                    </button>
                                            
                                            </form> 

                                            <form action="" method="post">
                                     
                                                <input type="hidden" value="<?= $ligne['id_plat']?>" name="id_modif">
                                                <button type="submit" class="mx-4" name="btnedit">  <i class="fa-solid fa-pen-to-square text-dark "> </i>
                                                    </button>
                                            
                                            </form>

                                        </td>
                                    </tr>
                                    <?php } ?>


                                    </tbody>
                            
                            </table>

                                <!-- <button class="btn  float-end my-4 bg-dark text-white" style="
                                height: 60px; border-radius: 15px; " data-bs-toggle="modal" data-bs-target="#myModal1"><h5>Ajouter un client</h5> </button>
                            <br> -->

                        </div>
                        
                <?php

if(isset($_POST['btnedit']) & isset($_POST['id_modif']) ){

    $id = $_POST['id_modif'];

    $row = mysqli_fetch_assoc(mysqli_query($conn , " SELECT * FROM plat WHERE deleted =0 AND id_plat=$id"));

                            ?>

            <form action="../client Side/editplat.php" method="get " class="form mx-3 text-center  formulaire " class="z-20 " style="width:40%; z-index:1000; position:absolute; top:20%; background-color:rgba(128, 128, 128); border-radius :14px; left:37%;" >
            <h3 class="my-3 text-white">Modifier une  publication</h3>
            <!-- <p class="mt-4 h3 text-center"> </p> -->

            <input type="hidden" name="me2" value="<?= $r=$_POST['id_modif']?>">

        <div class="form-floating mt-4 mx-5">
            <input type="text" class="form-control " id="nom" placeholder="Nom" style="border-radius: 70px; background-color: rgb(217, 217, 217); " name="nom" value="<?=$row['libelle']?>">
            <label for="nom">Libelle</label>
            </div>

        <!-- deuxieme input  -->


            <div class="form-floating mt-4 mx-5">
                <input type="number" class="form-control " id="pu" placeholder="prix unitaire" style="border-radius: 60px; background-color: rgb(217, 217, 217); " name="pu" value="<?=$row['pu']?>">
                <label for="pu">prix unitaire</label>
            </div>

            <div class="form-floating mt-4 mx-5">
                <input type="file" class="form-control " id="image" placeholder="image" style="border-radius: 60px; background-color: rgb(217, 217, 217); " name="image" value="<?=$row['url_photo']?>">
                <label for="imaget">image</label>
            </div>


            

            <div class="my-3">


            <button type="button" id="monboutton" class="bg-danger from-control"style="width: 20%; border-radius:60px ; margin-left: 0%; background-color: rgb(2, 156, 177); height: 50px;">Annuler</button>
                <input type="submit" name="btnconfirm" value ="Modifier" style="width: 20%; border-radius:60px ; margin-left: 0%; background-color: rgb(2, 156, 177); height: 50px;" class="mt-3">


            </div>


        </form>

            







 <?php }?>

                            </div>

                            </div>



               </div>


        </div>

        


        

    </div>
    

    
</body>
</html>