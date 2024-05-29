<?php

require('../config.php');
$conn = connect();

$req = "SELECT * FROM Plat";
$re =mysqli_query($conn , $req);
$ligne = mysqli_fetch_array($re);
echo($ligne[2]);
// $resu = mysqli_fetch_array()

















?>