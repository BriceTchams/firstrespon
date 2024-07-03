<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'restaurant');
 
// Connexion � la base de donn�es MySQL 
function connect(){


        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        // V�rifier la connexion
        if($conn === false){
            die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
        }
        return $conn;
}
?>