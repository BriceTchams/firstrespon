<?php
        session_start();
        require('../config.php');
        $conn = connect();
        $email =$_SESSION['email'];
        $pass = $_SESSION['password'];

        // recuperation de l'id du client courant 

        // $idreq = "SELECT * FROM Client WHERE email='$email' AND mot_de_passe ='$pass'";
        // $idres = mysqli_fetch_assoc(mysqli_query($conn , $idreq));


        $id_client = $_POST['idclient'];

        // date de commande quiest gérée de facon automaticque en php
        date_default_timezone_set('Africa/Douala');

        $date = date("y-m-d");
        echo($date);

        // requette qui insert les informations d'une nouvelle commande


        $requette = "INSERT INTO Commande (date_com , id_client) values('$date','$id_client')";
        $resultat  = mysqli_query($conn , $requette);

        // recuperation de l'id de la commande pour inserer ses lignes ;

        $resulCom = mysqli_fetch_array(mysqli_query($conn , "SELECT COUNT(id_com) FROM Commande"));

        $idCom = $resulCom[0]; // recuperation de l'id de la commande 

        // var_dump($idCom);

        //recuperation des differents identifiant des produit du panier 

        if(
            isset($_SESSION['panier'])
        ){
        $ids = array_keys($_SESSION['panier']);
        // var_dump($ids); 
        }

        // parcours des elemeents du panier et insertion dans la table ligne de commande
        foreach ($ids as $key) {
            $qt = $_SESSION['panier'][$key];

            echo($qt);

            // Isertion dans la table ligne de commande

            $req ="INSERT INTO Ligne_commande(quantite , id_com , id_plat) values ('$qt' , '$idCom' , '$key')";
            $result = mysqli_query($conn , $req);

            // destruction des elements du PHP
            unset($_SESSION['panier'][$key]);
        }
       header("Location:./panier.php?nom='bien'");

        














































?>