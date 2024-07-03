<?php 
   function connexionMsqli(){
    $conn= new mysqli('localhost','root','','restaurant');
   	if ($conn){
   		return $conn;
   	}else{
       echo "Could not connect to mysql".mysqli_error($con);
       return false;
   	} 
   }
   
?>