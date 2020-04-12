meral
<?php
error_reporting(0);

require('includes/html2fpdf.php');

$save_file = "pdf/try1.pdf";

$pdf=new HTML2FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);	

$noofrecord = 0;

for($ii=1; $ii<=10; $ii++)
{
	
	
	$currentheight =0;
	
	if($heightCount > ($page*$pdf->h))
					$currentheight = ($heightCount - ($page*$pdf->h));
					
	if($currentheight>0)
	{
		
		$pdf->AddPage();
		$page++;
		
	}
	
	$html="<table height='50'><tr><td style='text-align:center;'>".$ii."</td></tr></table>";
	$pdf->WriteHTML($html);	
	$heightCount+=$pdf->getY();
	
	//echo $pdf->getY();
	//echo "<br>";
	
	$noofrecord++;
}


$pdf->Output($save_file);

?>