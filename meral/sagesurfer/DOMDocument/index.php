<?php
$html = file_get_contents('https://en.wikipedia.org/wiki/List_of_Hindu_festivals'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

    $pokemon_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html

    $pokemon_xpath = new DOMXPath($pokemon_doc);

	$classname="headerSort";
	$pokemon_row = $pokemon_xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

    //$pokemon_row = $pokemon_xpath->query("*[class~='headerSort']");

    if($pokemon_row->length > 0){
        foreach($pokemon_row as $row){
            echo $row->nodeValue . "<br/>";
        }
    }
}
?>