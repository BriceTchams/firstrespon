<div class="col-sm-12 col-md-12 sdBig"
            background-size:100% 100%;">
                
                <div class="  mt-4 text-white " style="background-color: rgba(0, 0, 0, 0.525);; border-radius: 7px; display: inline-flex; width: 99%; height: 55px; margin-left:1%;">
                        <h4 class="mx-4 mt-2">Votre Panier </h4>

                                            <!-- <span class="h4 my-2" style="margin-left: 63%;"> 3 Plats</span> -->

                </div>

                <?php 
                //liste des produits 

                // recuperation des id des produits du paniers verifier si le panier existe d'abord
                if(
                    isset($_SESSION['panier'])
                ){
                   $ids = array_keys($_SESSION['panier']);
                // var_dump($ids); 
                }
                
                
                // il y'a aucune cle dans le panier
                if(empty($ids)){
                    echo("<marquee behavior='scroll' direction='left'><h2>votre panier est vide</h2>
                </marquee>");
                } else{
                    $produits = mysqli_query($conn , "SELECT * FROM Plat WHERE id_plat IN (".implode(',', $ids).")");

                    // var_dump($produits);

                    // liste des produits avec une bouche 
                    $totaux =0;
                // }
                ?>
                <!-- Element 1 du panier  -->
               
                <div class="row my-2"> 

                    <div class="col-sm-7" >
                        <!-- var(--ActiveColor) -->
                        <?php while($row =mysqli_fetch_assoc($produits)){
                            // $row1 =mysqli_num_rows($produits);
                            // var_dump($row1);
                          $totaux += $row['pu'] * $_SESSION['panier'][$row['id_plat']];

                        ?>
                        <div class="row mt-4 mx-3" style="background-color:rgba(128, 128, 128, 0.715); 
                        border-radius: 10px;">
                            <div class="col-sm-4 col-md-4">
                                <img src="../imagePlat/<?= $row['url_photo']?>" alt="PouletDj" width="88%" height="86%" class="my-3" >

                            </div>

                            <div class="col-sm-3 col-md-3 ">
                                <H4 style="color: rgb(224, 240, 130);" class="mt-3 text-center">Description</H4>
                                <h5 class="text-center" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><strong><?= $row['libelle']?></strong> </h5>
                                <h4 style="color: rgb(228, 244, 133); " class="text-center">Quantité</h4>


                                    <span class="d-flex justify-content-center my-4">    
                                        <a href="./panier.php?id2=<?= $row['id_plat']?>" class="page-link">
                                            <i class="fa-solid fa-circle-minus text-white  fa-2x "></i>
                                        </a>
                                        <h4 class="mx-3"> <?=  $_SESSION['panier'][$row['id_plat']] ?></h4> 
                                        <a href="./panier.php?id1=<?= $row['id_plat']?>" class="page-link">
                                            <i class="fa-solid fa-circle-plus text-white  fa-2x " ></i>
                                        </a>
                                        
                                     </span>


                            </div>

                            <div class="col-sm-4 col-md-4 text-center mt-2">
                                <H4 style="color: rgb(224, 240, 130);">Prix Unitaire</H4>
                                <h6 class="text-white"> <?= $row['pu']?> XAF</h6>
                                <h4 style="color: rgb(228, 244, 133);">Prix Total </h4>
                                <h3 class="text-white"> <?= $row['pu'] * $_SESSION['panier'][$row['id_plat']]?> XAF</h3>


                            </div>
                            <div class="col-sm-1 col-md-1">
                                <a href="./panier.php?id=<?= $row['id_plat']?>" style="margin-top: 40%; margin-right: 15%;" class="page-link"><i class="fa-solid fa-trash fa-2x text-danger" ></i>   </a>              
                           </div>
                           

                        </div>
                        <?php }?>


 
                      
                    </div>

                        

                  
                        <!-- SOMMAIRE DU panier -->
                     <div class="col-sm-5 col-md-5 col-12 text-left">

                        <div class="card mt-5  bg-dark" style="width: 100%; margin-top: 15%; margin-bottom: 30%;">
                            <div class="card-header text-center my-2 " style="border: none; color:rgba(25, 6, 246, 0.85); ">
                                    <H3 class="mt-1 text-white"> <strong>SOMMAIRE</strong></H3>
                            </div>
                            <div class="card-body border-none"">
                                <div class="d-flex " style="margin-left: 30%;">
                                    <h3 class="text-white" style="font-size: 30px;">
                                    <?php
                                 if(isset($_SESSION['panier'])){
                             $count = array_sum($_SESSION['panier']); 
                             echo($count);
                                 }
                                 ?>
                                </h3>
                                <h3 class="mx-2 text-white">plats</h3>
                                </div>
                                

                                <DIV class="d-flex text-center" style="margin-left: 30%;">
                                    <h3 class="text-white">
                                    <?php
                                 if(isset($_SESSION['panier'])){
                                     echo($totaux);
                                 }
                                 ?>
                                    
                                    </h3>
                                         <h3 class="text-white">XAF</h3> 
                                </DIV>
                               
                            
                            </div>
                            <div class="card-footer" style="border: none; background-color:;">
                                <!-- <button  >
                                
                                     


                                </button> -->

                                <a href="passerCommande.php"class="btn my-4 bg-light" style="width: 70%; font-size: 25px; margin-left: 15%;
                                border-radius: 60px;">   <strong>
                                        Commander
                                        </strong>
                                </a>
                            </div>
                        </div>
                    </div> 

                    <?php }?>


                   
                    </div>

                    
                   


                </div>
            </div>