<?php

class QrCodes
{
	var $Size = 150;
	var $CorrectionLevel="M";
	var $Margin=1;
	var $IsImage  = 0;
	var $CoddingType = 0;
	var $TransparencyLv=0;
	var $addres="";
	var $Background="FFFFFF";
	public $envatoLink="";
	public $codding="";


	public function SelectCodding($codding)
	{
		switch($codding)
		{
			Case 0:
				$codeText = "UTF-8";
				break;
			Case 1:
				$codeText = "Shift_JIS";
				break;
			Case 2:
			  $codeText = "ISO-8859-1";
				break;
		}
		return $codeText;
	}
	
	public function AsImage($text)
	{
		if ($this->IsImage == 1)
		{
			$text = "<img src='" . $text ."'/>";
		}
		
		return $text;
	}

	public function CreateBasicAddres()
	{
		$transparency ="a,s,";
		switch ($this->TransparencyLv)
		{
			Case 0:
				$transparency .= "000000";
				break;
			Case 20:
				$transparency .= "000000CD";
				break;
			Case 40:
			  $transparency .= "0000009B";
				break;
			Case 60:
			  $transparency .= "00000064";
				break;
				Case 80:
			  $transparency .= "00000032";
				break;
			Case 100:
			  $transparency .= "00000000";
				break;	
		}
	
		return "http://chart.apis.google.com/chart?chf=".$transparency."|bg,s,".$this->Background."&chs=" . $this->Size . "x". $this->Size ."&chld=".$this->CorrectionLevel."|".$this->Margin."&cht=qr&chl=";
	}

	function GetCode($text)
	{   

		$text = $this->CreateBasicAddres() .urlencode($text) . "&choe=" . $this->SelectCodding($this->CoddingType);
		$text=str_replace("%250A", "%0A", $text);
		$text = $this->AsImage($text);
		return $text;
	}
}


?>