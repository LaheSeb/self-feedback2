git add .<?php
// Connexion à la BDD 
$link = mysqli_connect('localhost','root','','feedback');
// Si base de données en UTF-8, il faudra utiliser la fonction utf8_decode() pour tous les champs de texte à afficher

$requete = "SELECT * FROM avis_plats ";
$result = mysqli_query($link, $requete);

$data_voyageur = mysqli_fetch_array($result);
mysqli_free_result($result);

// la librairie FPDF
require("fpdf/fpdf.php");

class PDF extends FPDF {

    function Header() {
      
      $this->Ln(20);
  
      $this->SetFont('Helvetica','B',11);
      $this->setFillColor(230,230,230);
      $this->SetX(70);
      $this->Cell(60,8,'Cantine',0,1,'C',1);
      $this->Ln(10);    
    }
    function Footer() {
      $this->SetY(-15);
      $this->SetFont('Helvetica','I',9);
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
  }
$pdf = new PDF('P','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
$pdf->AliasNbPages();
$pdf->SetFont('Helvetica','B',11);
$pdf->setFillColor(230,230,230);   
$pdf->Ln(10); 

function entete_table($position_entete) {
    global $pdf;
    $pdf->SetDrawColor(183); 
    $pdf->SetFillColor(221); 
    $pdf->SetTextColor(0);
    $pdf->SetY($position_entete);
  
    $pdf->SetX(70);
    $pdf->Cell(60,8,'gout des plats',1,0,'C',1); 
    
    $pdf->SetX(70); 
    $pdf->Cell(60,8,'diversité des plats',1,0,'C',1);

    $pdf->SetX(70);
    $pdf->Cell(60,8,'chaleur des plats',1,0,'C',1);

    $pdf->SetX(70);
    $pdf->Cell(60,8,'commentaire des plats',1,0,'C',1);
  
    $pdf->Ln(); 
  }

  $position_entete = 70;

  $pdf->SetFont('Helvetica','',9);
  $pdf->SetTextColor(0);
 
  entete_table($position_entete);
$position_detail = 78; 
$requete2 = "SELECT * FROM avis_plats WHERE id_p='1'";
$result2 = mysqli_query($link, $requete2);
while ($data_visit = mysqli_fetch_array($result2)) {
  $pdf->SetY($position_detail);
  $pdf->SetX(10);
  $pdf->MultiCell(60,8,utf8_decode($data_gout_plat['gout des plats']),1,'C');
  $pdf->SetY($position_detail);
  $pdf->SetX(70); 
  $pdf->MultiCell(60,8,utf8_decode($data_diversité_plat['diversité des plats']),1,'C');
  $pdf->SetY($position_detail);
  $pdf->SetX(70); 
  $pdf->MultiCell(60,8,utf8_decode($data_chaleur_plat['chaleur des plats']),1,'C');
  $pdf->SetY($position_detail);
  $pdf->SetX(70); 
  $pdf->MultiCell(60,8,utf8_decode($data_commentaire_plat['commentaire des plats']),1,'C');
  $pdf->SetY($position_detail);
  $pdf->SetX(70); 



  $position_detail += 8; 
}
mysqli_free_result($result2);
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->SetTextColor(0);
$pdf->AliasNbPages();
$pdf->Cell(500,20,utf8_decode('Plus rien à vous dire ;-)'));

$pdf->Output('test.pdf','I');
$pdf->Output('F', '../fic/test.pdf');
?>
									
					