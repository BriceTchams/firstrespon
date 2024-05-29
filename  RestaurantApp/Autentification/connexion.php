  
  <?php
  require('../config.php');
  $conn = connect();
  session_start();
 

  if (isset($_POST['email']) & isset($_POST['password'])  ){
 
    // $email = stripslashes($_REQUEST['email']);
    extract($_POST);
    
      // echo($email);
      // echo($password);


    // $password = mysqli_real_escape_string($conn, $password);

    // recuperation du type client
    //   $query = "SELECT * FROM `client` WHERE  email='$email' AND mot_de_passe='$password' ";
    // $result = mysqli_query($conn,$query) ;
    // $rows = mysqli_num_rows($result);


   

var_dump($email);
var_dump($password);


     $_SESSION['email'] = $email;
    $_SESSION['password'] = $password; 
    
    // if($rows==1){
    //     header("Location:../client Side/Acceuil.php");
    // echo"moi";
    // }

    $query1 = "SELECT * FROM `restaurant` WHERE email='$email' ";
    $result1 =mysqli_query($conn,$query1);
    // var_dump($result1);
    $rows1 = mysqli_num_rows($result1);
    var_dump($rows1);
    if($rows1==1){
      header("Location:../client Module/Acceuil.php");
    }
  // echo"moi";
  

    
  // recuperation type restaurant 
    $query1 = "SELECT * FROM `client` WHERE email='$email'";
    $result1 = mysqli_query($conn,$query1) ;
    $rows = mysqli_num_rows($result1);

    if($rows==1){
      header("Location:../client Side/Acceuil.php");
  }

  // else{

  //   header("Location:../PageVitrine.php?sweet=good");

  // }


  //  echo"  <script>
  //  alert('information incorrecte');
  //  </script>";
  

  // function check($email , $password , $conn){
  //   // $email = $_POST['email'];
  //   // $password = $_POST['password'];
    
  //       $query = "SELECT * FROM `client` WHERE  email='$email'";
  //       $result = mysqli_query($conn,$query);
  //       $rows = mysqli_num_rows($result);


  //       // $query1 = "SELECT  FROM `restaurant` WHERE email='$email' AND mot_de_passe='$password' ";
  //       // $result1 = mysqli_query($conn,$query) ;
  //       // $rows1 = mysqli_num_row($result1);

  //     if($rows==1){
  //       $_SESSION['email'] = $email;
  //       $_SESSION['password'] = $password; 
  //       // return 1;
  //             header("Location:../client Side/Acceuil.php");

  //     }
  // //     if($rows==1){
  //       $_SESSION['email'] = $email;
  //       $_SESSION['password'] = $password; 
  //       return 0;
  //     }
 
  // }

}
  


  ?>
  