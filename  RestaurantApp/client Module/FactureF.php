<?php
require('fpdf.php');

require('../config.php');
$conn =connect();
// recuperation de l'id de la commande envoyee
$idcommande = $_GET['id_com'];
// var_dump($idcommande);
// requette qui recupere les information s de la commande 
$requette = "SELECT DISTINCT cm.id_com,l.id_com, r.nom as rnom, cm.date_com as datecom , c.prenom as cprenom ,  r.ville as rville, r.telephone as rphone, c.nom as cnom ,c.ville as cville ,l.id_com, l.id_ligne ,p.libelle, p.pu , l.quantite , c.telephone as cphone ,r.url as rurl , c.email as cmail , r.email as rmail FROM client c ,commande cm , ligne_commande l, plat p, restaurant r WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
p.id_restau = r.id_restau and l.id_com='$idcommande'";

// execution  de la requette et resultat dans un tableau associatitf
$resultat = mysqli_query($conn , $requette);
$commande = mysqli_fetch_array(mysqli_query($conn , $requette));

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


$pdf->Cell(60,8,'' , 0,0,'C');
$pdf->Cell(185,8,'Date :  '.$commande['datecom'], 0,0,'C');

$pdf->Ln();

$pdf->Cell(60,8,$commande['rnom'] , 0,0,'C');
$pdf->Cell(190,8,$commande['cnom'] , 0,0,'C');

$pdf->Ln();

$pdf->Cell(60,6,$commande['rville']  , 0,0,'C');

// $pdf->Cell(60,6,$commande['rville']  , 0,0,'C');
$pdf->Image('../imageclientRestau/'.$commande['rurl'] , 90 ,20 , 15 ,15);



$pdf->Cell(190,6,$commande['cville']  , 0,0,'C');

$pdf->Ln();

$pdf->Cell(60,8,$commande['rphone'] , 0,0,'C');
$pdf->Cell(190,8,$commande['cphone'] , 0,0,'C');

$pdf->Ln();


$pdf->Cell(60,8,$commande['rmail'] , 0,0,'C');
$pdf->Cell(190,8,$commande['cmail'] , 0,0,'C');

$pdf->Ln();
$pdf->Ln();



// $pdf->Cell(40,10,'numero' , 1,0,'L');

// entete de la faxcture 
$pdf->SetFont('Arial','',11);

$pdf->Cell(40,7,'numero' , 1,0,'C');
// 6 est la hauteur de la cellule
// 40 est la ;largeur de la cellule
// numero est le contenu de la cellule
// 1 represente la taille de la cellule 
// c definir la position d'aligment de la cellule
$pdf->Cell(40,7,'Nom du plat' , 1,0,'C');
$pdf->Cell(30,7,'Prix unitaire' , 1,0,'C');
$pdf->Cell(40,7,'Quantite' , 1,0,'C');
$pdf->Cell(40,7,'Prix total' , 1,0,'C');
$i=1;
$totaux=0;
    $pdf->Ln();

    //boucle qui parcours le resultat de la requette qui selectionne les informations d'une commande

foreach($resultat as $key ) {
    $totaux += $key['pu']* $key['quantite'] ;
    $pdf->Cell(40,7,$i, 1,0,'C');
$pdf->Cell(40,7,$key['libelle'], 1,0,'C');
$pdf->Cell(30,7,$key['pu'] , 1,0,'C');
$pdf->Cell(40,7,$key['quantite']  , 1,0,'C');
$pdf->Cell(40,7,$key['pu'] * $key['quantite'], 1,0,'C');
$pdf->Ln();
$i++;

    # code...
}

$pdf->SetFont('Arial','B',10);

$pdf->Cell(150,20,'TOTAUX' , 0,0,'R');

$pdf->SetFont('Arial','B',15);


$pdf->Cell(50,20,$totaux .'XAF', 0,0,'L');

// 'facture'.($commande['id_com']).'.pdf', 'D'
$pdf->Output();
// D permet de telecharger la facture avec lw navigateur 

?>
