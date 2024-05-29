
<div class="modal" id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content bg-white">
      
            <!-- Modal Header -->
            <div class="modal-header ">
              <h3 class="text-center  text-dark" style="margin-left:6%; "><strong>Créer votre compte maintenant</strong></h3>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="./Autentification/inscritpion.php" class="form mx-3 " method = "post" enctype="multipart/form-data" >

                
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="nom" placeholder="Nom" style="border-radius: 70px; background-color: rgb(217, 217, 217);"
                        name ="nom" required>
                        <label for="nom">Nom</label>
                      </div>

                      <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Nom" style="border-radius: 70px; background-color: rgb(217, 217, 217);" >
                        <label for="prenom">Prenom</label>
                      </div>
      
      
                    <div class="form-floating mt-3">
                        <input type="Email" class="form-control" name = "email" id="email" placeholder="Email" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="email">Email</label>
                    </div>
            
               
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="pays"  name="pays" placeholder="Ville" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="pays">Pays</label>
                      </div>
                    <!-- </select> -->
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="ville">Ville</label>
                      </div>

                           <!-- </select> -->
                    <div class="form-floating mt-4">
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="phone" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="phone">telephone</label>
                      </div>

                      
            
                    <div class="form-floating mt-4">
                        <!-- <input type="Email" class="form-control" id="floatingPassword" placeholder="Email" style="border-radius: 70px; background-color: rgb(217, 217, 217);"> -->
                        <select name="type" id="type" class="form-control" style="border-radius:60px ; background-color: rgb(217, 217, 217);">
                            <option value="client" selected>client</option>
                            <option value="restaurant"> restaurant</option>
                        </select>     
                          <label for="type">type</label>
            
                      </div>
            
            
                     <div class="form-floating mt-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                  
                    <div class="form-floating mt-3">
                        <input type="file" name="image" class="form-control" id="image" placeholder="image" style="border-radius: 70px; background-color: rgb(217, 217, 217);" required>
                        <label for="image">Url image</label>
                    </div>
            
                        <!-- <button type ="submit" class=" bg-dark  form-control text-center my-4 text-white" style="width: 70%; border-radius:60px ; margin-left: 15%;  height: 60px;  "> Creer un compte</button> -->

                       <input type="submit" value="Céer un compte" name = "soumettre"
                      class="  bg-dark  form-control text-center my-4 text-white"  style="width: 70%; border-radius:60px ; margin-left: 15%;  height: 60px;  ">
                </form>   
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
      
          </div>
       
        </div>

      </div>