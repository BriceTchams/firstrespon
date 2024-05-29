
      <!-- The Modal numero 1-->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content bg-white">
      
            <!-- Modal Header -->
            <div class="modal-header ">
              <h2 class="text-center  " style="margin-left:30%; color: black;"><strong class="text-center">Connexion</strong></h2>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <form action="./Autentification/connexion.php" class="form mx-3 " Method="POST" >
                  <!-- <p class="mt-4 h3 text-center"> </p> -->
      
               <div class="form-floating mt-4">
                  <input type="Email" class="form-control" name= "email" required id="floatingPassword" placeholder="Email" style="border-radius: 70px; background-color: rgb(217, 217, 217);">
                  <label for="floatingPassword">Email</label>
                </div>
      
              <!-- deuxieme input  -->
      
      
                  <div class="form-floating " style="margin-top: 30px; ">
                      <input type="password" name="password" class="form-control" required id="floatingPassword" placeholder="Email" style="border-radius: 60px; background-color: rgb(217, 217, 217);">
                      <label for="floatingPassword">Mot de passe</label>
                  </div>
      
      
      
                <!-- <button class="  form-control text-center my-4 text-white" style="width: 70%; border-radius:60px ; margin-left: 15%; background-color: rgb(2, 156, 177);"> <a href="./client Module/Acceuil.html" class="text-decoration-none text-white">Creer un compte</a></button> -->
      

                  <!-- <button type="submit" class="   text-center my-4 text-white" style="width: 60%; border-radius:60px ; margin-left: 18%; background-color: rgb(2, 156, 177); height: 50px;"><h4>Se connecter</h4></button> -->

                  <input type="submit" value="Se connecter" name = "connecte"
                      class="  bg-dark  form-control text-center my-4 text-white" style="width: 60%; border-radius:60px ; margin-left: 18%; background-color: rgb(2, 156, 177); height: 50px;">

                  
          </form>      
        </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
      
          </div>
        </div>
 </div>