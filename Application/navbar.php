<div style="background-image:url(./image/BackAcceuiil.PNG); " class="row " >
<nav class="navbar navbar-expand-lg navbar-light " >
        <div class="container-fluid">
          <a class="navbar-brand mx-3 mt-2" href="#"> <strong  style="font-family: Extra Bold Italic; " class="mx-1"><span style="color: rgb(207, 246, 53);font-size: 37px;">W</span ><span class="text-white" style="font-size:27px;">ell</span><span style="color: rgb(207, 246, 53); font-size: 37px;">F</span ><span class="text-white"  style="font-size: 26px;">ood</span></strong></a>
        


          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <!-- <a class="nav-link active" aria-current="page" href="#">Informations</a> -->
              </li>
              <li class="nav-item">
              <a href="" class="nav-link text-left mt-3 mx-2"><h4 class=" text-white ">Acceuil</h3></a>
              </li>
             
              
               
              <!-- langue -->
           
              <div class="dropdown  mt-4 mx-2">

                <span style="background-color:var(--mainBackground); margin-right:1%; font-size: 22px;" class=" dropdown-toggle text-left text-white mt-3" data-bs-toggle="dropdown"><strong>Langue </strong> </span>

                <ul class="dropdown-menu">

                    <li><a href="" class="dropdown-item">Francais</a></li>

                    <li><a href="" class="dropdown-item">Anglais</a> </li>

                </ul>

                </div>
            <!-- notification -->
          <!-- cloche de notifications -->
          <a href=""class="text-white mt-3 " style="margin-left:540px;" >
                              <span  type="button"   class=" position-relative text-left">
                           <i  class="fa-solid fa-bell fa-2x text-white">  </i>  
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 0
                         
                                <span class="visually-hidden">
                                    jkkl
                                </span>
                            </span> 
                        </span>
                        </a>

          <!-- panier -->
          <a href="./panierVitrine.php" class="nav-item text-white mt-3 mx-4"style="" >
                        <span  type="button"   class=" position-relative">
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
             <!-- compte -->
             <div class="dropdown  mt-3 mx-4
             ">

                            <div  class="text-white  input-group" data-bs-toggle="dropdown" > 
                               <i class="fa-solid fa-user  fa-2x text-white"></i>
                                  <h4 class="mx-3 text-white">Mon compte</h4>
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
             
        </ul>
        
          </div>
        </div>
      </nav>

      <div class="row"> 
                <div class="col-sm-12">
                                     <h3 class="text-center my-2 text-white"><strong>Commandez des repas et plus</strong></h3>

                </div>              

                <div class="col-sm-2"></div>

                <div class="col-sm-8">


                  <div class ="input-group mb-5 ">
                    <!-- <div class="mt-5  rechercher"> -->
                        <input type="text" id="search" placeholder="Entrez le nom de votre repas ici" class="form-control  text-dark form-control-sm mt-1  " id="Rechercher"
                        style ="height: 55px; border-radius:30px 0px 0px 30px; 
                        ">
                        <button type="button " id="monboutton" class="btn btn-dark mt-1 text-white"style="color:var(--MainColor); border-radius: 0px 30px 30px 0px; " > <i class="fas fa-search" style=""></i></button>
                  </div>
                 </div>
            
    </div>
    </div>


    <script>
                $(document).ready(function () {
                
                   $('#search').keyup(function () { 
                var valeur = $(this).val();
                // var valeur = valeur1.toLowerCase();
                

                 
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