<?php  
  class DocxConversion{
    private $filename;

    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
        {
			$pos = strpos($thisline, chr(0x00));
			if (($pos !== FALSE)||(strlen($thisline)==0)) {
			
			} else {
				$outtext .= $thisline." ";
			}
        }
        $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","~col~",$outtext);
        return $outtext;
    }
	
	function readWord($filename) {
	
		if(file_exists($filename))
		{
			if(($fh = fopen($filename, 'r')) !== false ) 
			{
				$headers = fread($fh, 0xA00);

				// 1 = (ord(n)*1) ; Document has from 0 to 255 characters
				$n1 = ( ord($headers[0x21C]) - 1 );

				// 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
				$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

				// 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
				$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

				// 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
				$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

				// Total length of text in the document
				$textLength = ($n1 + $n2 + $n3 + $n4);
			
				$extracted_plaintext = fread($fh, $textLength);
				// if you want to see your paragraphs in a new line, do this
				// return nl2br($extracted_plaintext);
				return $extracted_plaintext;
			} 
			else 
			{
				return false;
			}
		} 
		else 
		{
			return false;
		}  
	}
	
    private function read_docx(){

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

			 
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            
            zip_entry_close($zip_entry);
        }

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', "####", $content);
        $content = str_replace('</w:r></w:p>', "~~~~", $content);
        
		$striped_content = strip_tags($content);
        return $striped_content;
    }

 /************************excel sheet************************************/

function xlsx_to_text($input_file){
    $xml_filename = "xl/sharedStrings.xml"; //content file name
    $zip_handle = new ZipArchive;
    $output_text = "";
    if(true === $zip_handle->open($input_file)){
        if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
            $xml_datas = $zip_handle->getFromIndex($xml_index);
            $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            $output_text = strip_tags($xml_handle->saveXML());
        }else{
            $output_text .="";
        }
        $zip_handle->close();
    }else{
    $output_text .="";
    }
    return $output_text;
}

/*************************power point files*****************************/
function pptx_to_text($input_file){
    $zip_handle = new ZipArchive;
    $output_text = "";
    if(true === $zip_handle->open($input_file)){
        $slide_number = 1; //loop through slide files
        while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
            $xml_datas = $zip_handle->getFromIndex($xml_index);
            $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            $output_text .= strip_tags($xml_handle->saveXML());
            $slide_number++;
        }
        if($slide_number == 1){
            $output_text .="";
        }
        $zip_handle->close();
    }else{
    $output_text .="";
    }
    return $output_text;
}


    public function convertToText() {

        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
        {
            if($file_ext == "doc") {
                //return $this->read_doc();
                
				echo $docText = $this->readWord($this->filename);
				$ordWord = "";
				$finalReadArray = array();
				for($x=0; $x <= strlen($docText); $x++)
				{
					/*echo ord($docText[$x]);
					echo "-".$docText[$x];
					echo "<br /><br />";
					*/
					
					if(isset($docText[$x])) {
						$ordFigure = ord($docText[$x]);
						$cChar = trim($docText[$x]);
					}					
					if($ordFigure==13){
						if($ordWord==""){
							if(count($ordArray)>0) {
								
								if(count($ordArray)==1)
								{
									$finalReadArray[] = $ordArray[0];
								}
								else{
									$finalReadArray[] = $ordArray;
								}
								$ordArray = array();
							}
							
						}else
							$ordArray[] = $ordWord;
						$ordWord = "";
					}
					else {
						$ordWord .= $cChar;
					}				
				}
				
				echo "<pre>";
				print_r(array_filter($finalReadArray));
								echo "<pre />";
								
					
				return $finalReadArray;
				
            } elseif($file_ext == "docx") {
                
				$dataArray = array();
				$docText = $this->read_docx();							
				
				$ind_strength = explode('INDIVIDUAL STRENGTHS:',trim($docText));
				$ind_strength1 = explode('~~~~',trim($ind_strength[0]));
				$ind_strengthArray = array_slice(array_filter($ind_strength1),4);
				
				echo "<pre/>";
				print_r($ind_strengthArray);
				
				$team_strength = explode('INDIVIDUAL STRENGTHS:',trim($docText));
				$team_strength1 = explode('TEAM STRENGTHS:',trim($team_strength[1]));
				$team_strength2 = explode('~~~~',trim($team_strength1[0]));
				$team_strengthArray = array_slice(array_filter($team_strength2),0);
				
				echo "<pre/>";
				print_r($team_strengthArray);
				
				
				$success = explode('SUCCESSES:',trim($docText));
				$success1 = explode('Signature of Care Coordinator:',trim($success[1]));
				$success2 = explode('~~~~',trim($success1[0]));
				$successArray = array_slice(array_filter($success2),0);
				
				echo "<pre/>";
				print_r($successArray);	
				
				die;
				
				foreach($row as $col) {					
					$val = explode('~col~',$col);					
					foreach($val as $d) {
						if(!empty($d))
							$dataArray[] = trim($d);
					}
				}
				return array_chunk($dataArray, 3);
				
            } elseif($file_ext == "xlsx") {
                return $this->xlsx_to_text();
            }elseif($file_ext == "pptx") {
                return $this->pptx_to_text();
            }
        } else {
            return "Invalid File Type";
        }
    }

}

$docObj = new DocxConversion("demo1.doc");
$docText = $docObj->convertToText();

echo "<pre/>";
print_r($docText);

?>