<div class="row " style="background-image:url(./image/BackAcceuiil.PNG);  background-repeat: no-repeat;
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
                    <a href="./index.php" class="page-link text-left mt-3"><h4 class=" text-white ">Acceuil</h3></a>

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
                    <div class="col-sm-2 text-white">
                    <a href="./panierVitrine.php" class="text-white">
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
                                  <h4 class="mx-3 text-white" >Mon compte</h4>
                            </div>
        
                           <ul class="dropdown-menu" style="width: 250px;  background-color: (6, 92, 103, 0.809);">
        
                               
                            <button type="button" class="btn text-white w-100" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color:rgba(128, 128, 128, 0.715);">
                            <strong>Connexion</strong></button>

                            <button type="button" class="btn text-white w-100 mt-2" data-bs-toggle="modal" data-bs-target="#myModal1"
                            style="background-color:rgba(128, 128, 128, 0.715);">
                               <strong> Creer un compte</strong></button>
                               
                          
                              
        
                           </ul>

                          </div>
        

                    </div>

                </div>

            </div>  


             
    
</div>