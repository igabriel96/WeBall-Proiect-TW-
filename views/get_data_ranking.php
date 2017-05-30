<?php 
	if($_REQUEST['tip']=='csv')
	{
		 $db=oci_connect('student','STUDENT','localhost/XE');
		$sql ="select (Select nume from echipe where id=id_echipa) as echipa,GRUPA,VICTORII,EGALURI,INFRANGERI,GOLURI_DATE,GOLURI_PRIMITE,PUNCTAJ as echipa from clasament order by grupa ,punctaj desc";
		$statement=oci_parse($db,$sql);
		$result=oci_execute($statement);
		header('Content-Type: application/csv');
		header('Content-Disposition: attachement; filename="clasament.csv"');
		$fp = fopen('php://output', 'w');
		 $data="";
		while($row = oci_fetch_row($statement)) {
			fputcsv($fp,$row);
		}
		fclose($fp);
	}
	elseif ($_REQUEST['tip']=='pdf') 
	{
		require_once('fpdf\fpdf.php');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachement; filename="clasament.pdf"');
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
    $this->Cell(30,10,'Grupe',1,0,'C');
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
$sql ="select (Select nume from echipe where id=id_echipa) as echipa,GRUPA,VICTORII,EGALURI,INFRANGERI,GOLURI_DATE,GOLURI_PRIMITE,PUNCTAJ as echipa from clasament order by grupa ,punctaj desc";
$statement=oci_parse($db,$sql);
$result=oci_execute($statement);
$pdf->Cell(25,7,"Loc",1);
$pdf->Cell(25,7,"Echipa",1);
$pdf->Cell(25,7,"Victorii",1);
$pdf->Cell(25,7,"Egaluri",1);
$pdf->Cell(25,7,"Infrangeri",1);
$pdf->Cell(30,7,"Goluri date",1);
$pdf->Cell(25,7,"Goluri primite",1);
$pdf->Cell(25,7,"Punctaj",1);
$pdf->Ln();
$contor=1;
while($row=oci_fetch_row($statement))
    {
         if($contor==5)
        {    
            $pdf->Ln();
            $pdf->Cell(25,7,"Loc",1);
            $pdf->Cell(25,7,"Echipa",1);
            $pdf->Cell(25,7,"Victorii",1);
            $pdf->Cell(25,7,"Egaluri",1);
            $pdf->Cell(25,7,"Infrangeri",1);
            $pdf->Cell(30,7,"Goluri date",1);
            $pdf->Cell(25,7,"Goluri primite",1);
            $pdf->Cell(25,7,"Punctaj",1);
            $pdf->Ln();
            $contor=1;
        }

        $pdf->Cell(25,6,$contor,1);
        $pdf->Cell(25,6,$row[0],1);
        $pdf->Cell(25,6,$row[2],1);
        $pdf->Cell(25,6,$row[3],1);
        $pdf->Cell(25,6,$row[4],1);
        $pdf->Cell(30,6,$row[5],1);
        $pdf->Cell(25,6,$row[6],1);
        $pdf->Cell(25,6,$row[7],1);
        $pdf->Ln();
        $contor++;
    }
$pdf->Output();
	}


?>