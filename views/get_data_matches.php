<?php 
	if($_REQUEST['tip']=='csv')
	{
		 $db=oci_connect('student','STUDENT','localhost/XE');
		$sql ="select (Select nume from echipe where id=id_echipa1) as echipa1,(Select nume from echipe where id=id_echipa2) as echipa2,id_grupa,etapa,rezultat1,rezultat2,data_meci from meciuri";
		$statement=oci_parse($db,$sql);
		$result=oci_execute($statement);
		header('Content-Type: application/csv');
		header('Content-Disposition: attachement; filename="meciuri.csv"');
		$fp = fopen('php://output', 'w');
		 $data="";
		while($row = oci_fetch_row($statement)) {
			fputcsv($fp,$row);
		}
		fclose($fp);
	}
	elseif ($_REQUEST['tip']=='pdf') 
	{
		require_once('views\fpdf\fpdf.php');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachement; filename="meciuri.pdf"');
		class PDF extends FPDF
{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Meciuri',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$db=oci_connect('student','STUDENT','localhost/XE');
$sql ="select (Select nume from echipe where id=id_echipa1) as echipa1,(Select nume from echipe where id=id_echipa2) as echipa2,id_grupa,etapa,rezultat1,rezultat2,data_meci from meciuri";
$statement=oci_parse($db,$sql);
$result=oci_execute($statement);
$pdf->Cell(25,7,"Gazda",1);
$pdf->Cell(25,7,"Oaspete",1);
$pdf->Cell(25,7,"Grupa",1);
$pdf->Cell(25,7,"Etapa",1);
$pdf->Cell(25,7,"Goluri_gazda",1);
$pdf->Cell(30,7,"Goluri_oaspete",1);
$pdf->Cell(25,7,"Data_meci",1);
$pdf->Ln();
while($row=oci_fetch_row($statement))
    {
        $pdf->Cell(25,6,$row[0],1);
        $pdf->Cell(25,6,$row[1],1);
        $pdf->Cell(25,6,$row[2],1);
        $pdf->Cell(25,6,$row[3],1);
        $pdf->Cell(25,6,$row[4],1);
        $pdf->Cell(30,6,$row[5],1);
        $pdf->Cell(25,6,$row[6],1);
        $pdf->Ln();
    }
$pdf->Output();
	}


?>
