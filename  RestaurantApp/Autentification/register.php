<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" /> 
<style>
		 .box-input {
  font-size: 14px;
  background:#ffffff;
  border: 1px solid #ddd;
  margin-bottom: 35px;
  padding-left:10px;
  border-radius: 5px;
  width: 490px;
  height: 50px;
  box-shadow: inset 1px 2px 0px;

} 
.box-title{
    margin-left:50px;
}
	</style>
</head>
<body>
<?php
require('config.php');
$conn = connect();

if (isset($_REQUEST['username'],$_REQUEST['email'], $_REQUEST['password'], $_REQUEST['ville'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer [[les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);

    $ville = stripslashes($_REQUEST['ville']);
	$ville = mysqli_real_escape_string($conn, $ville);

    
    $type = stripslashes($_REQUEST['type']);
	$type= mysqli_real_escape_string($conn, $type);

	
    $query = "INSERT into `client` (username, email, password,ville,type)
              VALUES ('$username', '$email', '$password','$ville','$type')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo " <center> <div class='sucess'>
             <h2>Vous êtes inscrit avec succès.</h2>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div> </center>";
    }
}
else{
?>
<form class="box" action="" method="post"> <br>
	<h1 class=box-title>Inscription</h1>
    <!-- <h1 class="box-title">S'inscrire</h1> -->
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="text" class="box-input" name="ville" placeholder="entrer votre ville" required />
    <input type="text" class="box-input" name="type" placeholder="entrer votre type" required />

    <input type="submit" name="submit" value="S'inscrire" class="box-button" /><br>

    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
<br><br>
</form>
<?php } ?>
</body>
</html>