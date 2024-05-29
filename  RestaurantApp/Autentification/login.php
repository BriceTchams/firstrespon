<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
	
</head>
<style>
	.box-input {
  font-size: 14px;
  background:#ffffff;
  border: 1px solid #ddd;
  margin-bottom: 35px;
  padding-left:10px;
  border-radius: 5px;
  width: 500px;
  height: 50px;
  box-shadow: inset 0px 2px 1px;

}
</style>
<body>
<?php
require('config.php');
$conn = connect();
session_start();
$conn = connect();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `client` WHERE username='$username' and password='$password'";
	$result = mysqli_query($conn,$query) ;
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location:acceuil.php");
	}


	else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<form class="box" action="" method="post" name="login">
<!-- <h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1> -->
<center><h1 class="box-title">Connexion</h1></center>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">

<input type="submit" value="Connexion " name="submit" class="box-button">
<br><br>
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p> <br>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>