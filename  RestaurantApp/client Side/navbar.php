<?php
   date_default_timezone_set('Africa/Douala');


                            $mail = $_SESSION['email'];
                            $pass =$_SESSION['password'];
                            $query = "SELECT * FROM Client where email ='$mail' AND mot_de_passe = '$pass' ";

                            $r = mysqli_fetch_assoc(mysqli_query($conn , $query ));

                            
                            // <!-- recuperation de l'id du client qui possede le compte courant  -->

                            $id_client = $r['id_client'];
                            // echo ($id_client);

                            ?>
<div class="row " style="background-image:url(../image/BackAcceuiil.PNG);  background-repeat: no-repeat;
            background-size:cover;">
            <!-- <div class="col-sm-1 ">
               

            </div> -->

            <div class="col-sm-7">
                <div class="row text-white mt-3 ">
                    <div class="col-sm-2">
            
                  <!-- <h4 class="text-center">WellFood</h3> -->
                  <strong  style="font-family: Extra Bold Italic; " class="mx-2"><span style="color: rgb(207, 246, 53);font-size: 37px;">W</span ><span class="text-white" style="font-size:27px;">ell</span><span style="color: rgb(207, 246, 53); font-size: 37px;">F</span ><span class="text-white"  style="font-size: 26px;">ood</span></strong>

                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3"> 
                    <a href="" class="page-link text-left mt-3"><h4 class=" text-white ">Acceuil</h3></a>

                  </div>
                    <div class="col-sm-3"> 
                    <div class="dropdown mt-3">

                        <span style="background-color:var(--mainBackground); margin-right:1%; font-size: 22px;" class=" dropdown-toggle mt-3 text-left text-white" data-bs-toggle="dropdown"><strong>informations</strong> </span>

                        <ul class="dropdown-menu">

                            <li><a href="" class="dropdown-item">sdvdfvdf</a></li>

                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>


                        </ul>

                        </div>             
                              </div>
                    
                    <div class="col-sm-1"> 

                        <div class="dropdown mt-3">

                            <span style="background-color:var(--mainBackground); margin-right:1%; font-size: 22px;" class=" dropdown-toggle mt-3 text-left text-white" data-bs-toggle="dropdown"><strong>Langue </strong> </span>
            
                            <ul class="dropdown-menu">
            
                                <li><a href="" class="dropdown-item">Francais</a></li>
            
                                <li><a href="" class="dropdown-item">Anglais</a> </li>
            
                            </ul>
            
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-5 text-center">
                <div class="row text-white" style ="margin-top: 35px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2 text-left">
                        <!-- cloche de notifications -->

                        <?php 
                        $date= date('y-m-d');
                        $resu = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM notification n,Envoyer e, client  c,restaurant r WHERE e.id_restau = r.id_restau AND e.id_notif = n.id_notif AND e.id_client = c.id_client AND e.id_client = '$id_client' AND e.date_envoi='$date'

                        "));
                        // var_dump($resu);
                        
                        ?>
                      

                        <div class="dropdown ">

                    <span  class="  text-white" data-bs-toggle="dropdown">
                    <a href=""class="text-white ">
                              <span  type="button"   class=" position-relative text-left">
                           <i  class="fa-solid fa-bell fa-2x text-white">  </i>  
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> <?= $resu[0] ?>
                         
                                <span class="visually-hidden">
                                    jkkl
                                </span>
                            </span> 
                        </span>
                        </a> 
                 </span>
            <?php
                 $REQ=mysqli_query($conn, "SELECT n.objet , e.date_envoi , r.nom FROM notification n,Envoyer e, client  c,restaurant r WHERE e.id_restau = r.id_restau AND e.id_notif = n.id_notif AND e.id_client = c.id_client AND e.id_client = '$id_client' AND e.date_envoi='$date'

                 ");
                 
                 ?>

                    <ul class="dropdown-menu">


                            <?php  while ($row1 = mysqli_fetch_assoc($REQ)) {
                            ?>
                            <div class="bg-dark " style="width: 250px; border-radius: 7px;">

                           
                                <li class="dropdown-item text-white"><?=$row1['nom'] ?></li>
                                <li class="dropdown-item text-white"><?=$row1['objet'] ?> </li>
                                <li class="dropdown-item text-white"><?=$row1['date_envoi'] ?></li>
                            </div>
                            <hr>
                            <?php }?>


                    </ul>

                    </div>
                      
                    </div>
                    <div class="col-sm-2 text-white">
                    <a href="panier.php" class="text-white">
                        <span  type="button"   class=" position-fixed">
                            <i  class="fa-solid fa-cart-shopping fa-2x ">  </i>  
                             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">    
                                <?php
                                if(isset($_SESSION['panier'])){
                            $count = array_sum($_SESSION['panier']); 
                            echo($count);
                                }
                                ?>
                                 <span class="visually-hidden">
                                     jkkl
                                 </span>
                             </span> 
                         </span>    
                         </a>               
                    </div>
                    <div class="col-sm-4 col-md-5  col-4 text-center">
                        <!-- <i class="a-solid fa-user fa-2x"></i>
                        <span class="">Mon compte</span> -->
                        <div class="dropdown  mb-3 ">

                            <div  class="text-white  input-group" data-bs-toggle="dropdown" > 
                               <i class="fa-solid fa-user  fa-2x text-white"></i>
                                  <h4 class="mx-3 text-white">Mon compte</h4>
                            </div>
        
                           
                   <ul class="dropdown-menu" style="width: 350px;  background-color: (6, 92, 103, 0.809);">

                                        
 
                        <img src="../imageclientRestau/<?= $r['url']?>" alt="" width="15%" height="24%" style=" margin-left:35%; border-radius :100%;" class=" text-center">
                        <div class=" mt-2" style=" margin-left:8%; ">
                       
                           
                                <span class="h5">Nom:</span>

                                <!-- recuperation du nom er prenom du client qui possede le compte courant  -->
                            <span><?= $r['nom']?> <?= $r['prenom']?></span>
                        </div>
                        <div class=" mt-2 mb-3" style=" margin-left:7%; ">
                            <span class="h6">Email:</span>
                            <span><?php   echo($_SESSION['email']);
                                                                    ?></span>
                        </div>
                        <div>
                            <form action=""> 
                                <label for="" class="mx-4">Nouveau Mot de passe:</label>
                                <input type="text" placeholder="Nouveau mot de passe" class="form-control mt-3 mx-4" style="border-radius: 60px; width: 90%;">
                                <button  class="my-3 "   style="border-radius: 60px; width: 60%; margin-left: 20%; background-color: var(--MainColor);">Confirmer</button>
                                <!-- <input  value="Confirmer" > -->
                            </form>
                        </div>

                        <a href="../Autentification/logout.php" class="bg-light page-link text-grey mx-3 text-center mt-1"
                        style="height: 40px; border-radius: 10px;"><h5 class="mt-2"><i class="fa-solid    fa-right-from-bracket fa-1x mx-1 mt-2"></i> Se deconnecter</h5></a>



                    </ul>


                          </div>
        

                    </div>


                </div>

            </div>  


               <div class="row"> 
                <div class="col-sm-12">
                                     <h3 class="text-center my-4 mt-4 text-white"><strong>Commandez des repas et plus</strong></h3>

                </div>              

                <SPAN id='valeur'></SPAN>
               
                <div class="col-sm-2"></div>

                <div class="col-sm-8">


                  <div class ="input-group mb-5 ">
                    <!-- <div class="mt-5  rechercher"> -->
                        <input type="search" id="search" placeholder="Entrez le nom de votre repas ici !!" class="form-control  text-dark form-control-sm mt-1  " id="Rechercher"
                        style ="height: 55px; border-radius:30px 0px 0px 30px; 
                        ">
                        <button type="button " class="btn btn-dark mt-1 text-white"style="color:var(--MainColor); border-radius: 0px 30px 30px 0px; " > <i class="fas fa-search" style=""></i></button>
                  </div>
                  <script>
                $(document).ready(function () {
                   $('#search').keyup(function () { 
                var valeur = $(this).val();
                // $('#valeur').html(valeur)

    
                 
                    $.ajax({
                        url: "search.php",

                       type: "POST",
                        data: {input:valeur},
                        success: function (data) {
                            $("#resultat").html(data);
                            
                        }
                        
                    });

                // }
                // else{
                //     $("#resultat").css("display" , "none");

                // }





                
                
            });
            
        });
    </script>
                 </div>
                  <!-- </div>                -->
               
              </div>
              <div class="col-sm-2">

              </div>

          

        </div>