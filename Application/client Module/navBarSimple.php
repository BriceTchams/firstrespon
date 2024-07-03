<div class="row " style="background-image:url(../image/BackAcceuiil.PNG);  background-repeat: no-repeat;
            background-size:cover;">
            <!-- <div class="col-sm-1 ">
            <?php

?>

            </div> -->

            <div class="col-sm-7">
                <div class="row text-white mt-3 ">
                    <div class="col-sm-2">
            
                  <!-- <h4 class="text-center">WellFood</h3> -->
                  <strong  style="font-family: Extra Bold Italic; " class="mx-2"><span style="color: rgb(207, 246, 53);font-size: 37px;">W</span ><span class="text-white" style="font-size:27px;">ell</span><span style="color: rgb(207, 246, 53); font-size: 37px;">F</span ><span class="text-white"  style="font-size: 26px;">ood</span></strong>

                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3"> 
                    <a href="./Acceuil.php" class="page-link text-left mt-3"><h4 class=" text-white ">Acceuil</h3></a>

                  </div>
                    <!-- <div class="dropdown mt-3">

                        <span style="background-color:var(--mainBackground); margin-right:1%; font-size: 22px;" class=" dropdown-toggle mt-3 text-left text-white" data-bs-toggle="dropdown"><strong>informations</strong> </span>

                        <ul class="dropdown-menu">

                            <li><a href="" class="dropdown-item">sdvdfvdf</a></li>

                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>
                            <li><a href="" class="dropdown-item">dfvfdvdfv</a> </li>


                        </ul>

                        </div>              -->
                    
                    <div class="col-sm-1"> 
<!-- 
                        <div class="dropdown mt-3">

                            <span style="background-color:var(--mainBackground); margin-right:1%; font-size: 22px;" class=" dropdown-toggle mt-3 text-left text-white" data-bs-toggle="dropdown"><strong>Langue </strong> </span>
            
                            <ul class="dropdown-menu">
            
                                <li><a href="" class="dropdown-item">Francais</a></li>
            
                                <li><a href="" class="dropdown-item">Anglais</a> </li>
            
                            </ul>
            
                        </div> -->
                    </div>
                    <div class="col-sm-3"></div>

                </div>

            </div>
            <div class="col-sm-5 text-center">
                <div class="row text-white" style ="margin-top: 35px;">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2 text-">
                        <!-- cloche de notifications -->
                        <a href=""class="text-white ">
                              <span  type="button"   class=" position-relative text-left">
                           <i  class="fa-solid fa-bell fa-2x text-white">  </i>  
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 
                           
                                0
                                <span class="visually-hidden">
                                    jkkl
                                </span>
                            </span> 
                        </span>
                        </a>
                      
                    </div>
                    <!-- <div class="col-sm-1 text-white">
                                
                    </div> -->
                    <div class="col-sm-4 col-md-5  col-4 text-center">
                        <!-- <i class="a-solid fa-user fa-2x"></i>
                        <span class="">Mon compte</span> -->
                        <div class="dropdown  mb-3 ">

                            <div  class="text-white  input-group" data-bs-toggle="dropdown" > 
                               <i class="fa-solid fa-user  fa-2x text-white"></i>
                                  <h4 class="mx-3 text-white" >Mon compte</h4>
                            </div>
        
                            <ul class="dropdown-menu" style="width: 350px;  background-color: (6, 92, 103, 0.809);">

                                        
                                                     <?php
                                                    // require('../config.php');
                                                   
                                                    $mail = $_SESSION['email'];
                                                    $pass =$_SESSION['password'];
                                                   
                                                   

                                                    $query = "SELECT * FROM restaurant where email ='$mail' ";
                                                    $resultat = mysqli_query($conn , $query );
                                                    $im = mysqli_fetch_array($resultat);
                                                    // var_dump($im);

                                                    // var_dump($resultat);
                                                                                                                                            // var_dump($moi);

                                           ?>          
                                        <!-- while ( $r = mysqli_fetch_assoc($resultat)) {  -->
                                        <img src="../imageclientRestau/<?= $im[9]?>" alt="" width="15%" height="20%" style=" margin-left:35%; border-radius: 100%;" class=" text-center">
                                        <div class=" my-4" style=" margin-left:8%; ">
                                       
                                            <span class="h5 ">Email: 
                                              

                                            </span>
                                           <span><?php echo($mail) ;?></span>
                                        </div>
                                        

                                        


                                        <div>
                                            <form action=""> 
                                                <label for="" class="mx-5">Nouveau Mot de passe:</label>
                                                <input type="text" placeholder="Nouveau mot de passe" class="form-control mt-3 mx-4" style="border-radius: 60px; width: 90%;">
                                                <input class="form-control my-3 "  type="submit" value="Confirmer" style="border-radius: 60px; width: 60%; margin-left: 20%; background-color: var(--MainColor);">
                                            </form>
                                        </div>


                                         <a href="../Autentification/logout.php" class="bg-light page-link text-grey mx-3 text-center mt-1"
                        style="height: 40px; border-radius: 10px;"><h5 class="mt-2"><i class="fa-solid    fa-right-from-bracket fa-1x mx-1 mt-2"></i> Se deconnecter</h5></a>


                                        </ul>
                                        
                          </div>

                          
        

                    </div>

                </div>

            </div>  


             
    
</div>