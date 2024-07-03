<?php
  include "connexion.php";
  $conn = connexionMsqli();
  require 'autoload.php';
//   use DateTime;
  $faker = Faker\Factory::create('en_EN');

//    for($i=0; $i<600; $i++){    
//      $sql = "INSERT INTO client(email,nom,prenom,telephone,mot_de_passe,ville,type,pays,url) 
//      VALUES ('".$faker->email."','".$faker->firstName."','".$faker->lastName."','".$faker->randomNumber."','".$faker->firstName."','".$faker->city."','".$faker->lastName."','".$faker->lastName."','".$faker->firstName."')";
//         $query = $conn->query($sql);

//      //    var_dump($query);
//      echo $query;

  
//  }
$i=0;
   while($i<10000){    


//      $sql="INSERT INTO Restaurant(email ,nom , mot_de_passe , ville , type, pays ,telephone , date_creation, url , longitude , latitude) values ('" . $faker->email . "','" . $faker->lastname . "' ,'" . $faker->numberBetween(1,90). "' ,'" . $faker->city. "', 'RESTAURANT' ,'" . $faker->country. "', '" . $faker->randomNumber. "' , '" . $faker->date('Y-m-d') . "', '" . $faker->imageUrl() . "', '" . $faker->randomFloat(2, 0, 100) . "', '" . $faker->randomFloat(2, 0, 100) . "' )";

//           $query = $conn->query($sql);


$sql="
INSERT INTO Plat (url_photo , libelle , pu ,id_restau,date_post) values('" . $faker->imageUrl() . "', 
'" . $faker->word . "','" . $faker->numberBetween(2000, 5000) . "', '" . $faker->numberBetween(1, 601) . "', '" . $faker->date('Y-m-d') . "');
";

          $query = $conn->query($sql);

$






          $i++;

     }
// for($i = 0; $i< 100000; $i++){
//      $sql = "INSERT INTO produit (codeProd, nomProd, description, image, poid, prixU, prixV, dateAjout, dateModif, idUser, etat) 
//      VALUES ('" . $faker->unique()->randomNumber() . "', '" . $faker->word . "', '" . $faker->sentence . "', '" . $faker->imageUrl() . "', '" . $faker->randomFloat(2, 0, 1000) . "', '" . $faker->randomFloat(2, 0, 1000) . "', '" . ($faker->randomFloat(2, 0, 1000) * 1.2) . "', '" . $faker->date('Y-m-d') . "', '" . $faker->date('Y-m-d') . "', '" . $faker->numberBetween(1, 10) . "', 'active')";

//      $query = $conn->query($sql);
//       // var_dump($query);
//         echo $query;  
//      }
//      if (!$query) {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }

?>
