<?php

error_reporting(1);
require('includes/html2fpdf.php');


$pdf=new HTML2FPDF();
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false);	
	$my_file = "html/1234.html";
	$my_file1 = "pdf/1234.pdf";
$filecount=1;
//$url="https://banand:Google@87@rsgw-uat01.motorola.com/EXT_SAS_6.0_WM_Component_Monit-Test/getRTList?serverAlias=EAI_PRD_N1_IS_10013&startDate=2013-09-28%2000:00:00&endDate=2013-09-28%2004:27:00";

		$url="MC04_PickRelease.html";
		//$url="ws.html";
		$content = file_get_contents($url);
		$data=json_decode($content,true);
		
		$data = $data[0]["Transactions"];
		
		if($url!="" and sizeof($data)!= 0)
		{
			$html="<td style='text-align:center;'>Response Time</td>
					</tr>";
			$dt.="<td style='text-align:center;'>Response Time</td>
					</tr>";		
			$pdf->WriteHTML($html);		

			for($i=0;$i<sizeof($data);$i++)
			{
				if($norec > 10000)
				{
					$html="</table>";
					//$heightCount = $currentheight+100;
					$pdf->WriteHTML($html);
					$pdf->Output($my_file1);
					$my_file1 = 'pdf/1234_'.$filecount.'.pdf';
					$filecount++;
					$norec =0;
					$heightCount=0;
					$page =1;
					$pdf=new HTML2FPDF();
					$pdf->AddPage();
					$html="<table id='table' cellpadding='0' cellspacing='0' border='1'>
					<tr>
					<th height='30' colspan='8' align = 'center' style='text-align:center;'>".wordwrap($server,70,"<br>\n",TRUE)."</th>
					</tr>
					<tr>
					<th height='30' colspan='8' align = 'center'  style='text-align:center;'>Date: Component:</th>
					</tr>
					<tr>
					<td style='width:155px;'>Creation Date</td><td style='text-align:center;'>Response Time</td>
					</tr>";
					$pdf->WriteHTML($html);
					$html = "<tr>
					<td style='width:155px;'>Creation Date</td>
					<td style='text-align:center;'>Response Time</td>
					</tr>";
					$pdf->WriteHTML($html);
				}
				//$page
				$currentheight =0;
				
				/*echo "currentheight=".$currentheight;
				echo "<hr>";
				echo "heightCount=".$heightCount;
				echo "<hr>";
				echo "page=".$page;
				echo "<hr>";
				echo "pdf->h=".$pdf->h;
				echo "<hr color=green>";*/
				
				if($heightCount > ($page*$pdf->h))
					$currentheight = ($heightCount - ($page*$pdf->h));
				
				/*echo "currentheight=".$currentheight;
				echo "<hr>";
				echo "heightCount=".$heightCount;
				echo "<hr>";
				echo "page=".$page;
				echo "<hr>";
				echo "pdf->h=".$pdf->h;
				echo "<hr color=red>";
				
				echo "<br><br><br><br><br><br><br><br><br><br>";*/
				
				if($currentheight > 0)
				{
					
					$heightCount += $currentheight+0;
					//print($pdf->getY()."<=getY <br />" );
					//print $heightCount." count";
					//$heightCount = 0;
					$html="</table>\n";
					$pdf->WriteHTML($html);
					$page++;		
					$pdf->AddPage();			
					//print "pagecount".$pagecount++;

					$html="<table id='table' cellpadding='0' cellspacing='0' border='1'>
					<tr>
					<th height='30' colspan='8' align = 'center' style='text-align:center;'>SErver</th>
					</tr>
					<tr>
					<th height='30' colspan='8' align = 'center' style='text-align:center;'>Date:xxx to yyy  Component:ABC </th>
					</tr>";
					$pdf->WriteHTML($html);
					$html = "<tr>
					<td style='width:155px;'>Creation Date</td>
					<td style='text-align:center;'>Response Time</td>
					</tr>";
					$pdf->WriteHTML($html);
					
					//$count = 1;
				}
				
				/*
				$resp_time[]=$data[$i]['ResponseTime'];	
				$creation_date[]=$data[$i]['CreationDate'];	
				
				$html="<tr><td style='width:155px;'>".$data[$i]['CreationDate']."</td>
				<td style='text-align:center;'>".$data[$i]['ResponseTime']." Ms</td>
				</tr>";
				
				
				$dt.="<tr><td style='width:155px;'>".$data[$i]['CreationDate']."</td>
				<td style='text-align:center;'>".$data[$i]['ResponseTime']." Ms</td>
				</tr>";
				*/
				
				
				$resp_time[]=$data[$i]['TRM_ID'];	
				$creation_date[]=$data[$i]['Unique_ID'];	
				
				$html="<tr><td style='width:155px;'>".$data[$i]['TRM_ID']."</td>
				<td style='text-align:center;'>".$data[$i]['Unique_ID']." Ms</td>
				</tr>";
				
				
				$dt.="<tr><td style='width:155px;'>".$data[$i]['TRM_ID']."</td>
				<td style='text-align:center;'>".$data[$i]['Unique_ID']." Ms</td>
				</tr>";
				
			
				$pdf->WriteHTML($html);
				$heightCount+=$pdf->getY();
				$norec++;
				
				

			}
			$html="</table>";
			$dt.="</table>";
			$pdf->WriteHTML($html);
			$pdf->Output($my_file1);
			$html = $dt;			
			//echo json_encode($resp_time)."count:".json_encode($creation_date)."count:".$html;
		}
		else
		{
			echo "No data Found";
			$err_cnt=$err_cnt+1;
		}
		
		
			$file_folder="pdf/";
		//$filecount=3;
		if(file_exists($file_folder.'1234.pdf'))
		{
			$files_to_zip[] = '1234.pdf';
		}	
		for($i=1;$i<$filecount;$i++)
		{
			//$files_to_zip[]  = "temp".$i.".pdf";
			if(file_exists($file_folder.'1234_'.$i.'.pdf'))
			{
				$files_to_zip[] = '1234_'.$i.'.pdf';
			}	
		}
		print_r($files_to_zip);
		if(count($files_to_zip) > 0)
		{
			// Checking ZIP extension is available
			if(isset($files_to_zip) and count($files_to_zip) > 0)
			{
				// Checking files are selected
				$zip = new ZipArchive(); // Load zip library
				$zip_name = $file_folder. "1234.zip"; // Zip name
				if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
				{
					 // Opening zip file to load files
					$error .= "* Sorry ZIP creation failed at this time";
				}
				foreach($files_to_zip as $file)
				{
					$file_folder.$file;
					$zip->addFile($file_folder.$file,$file); // Adding files into zip
				}
				$zip->close();
			}
		}
?>