<?php
error_reporting(0);
$c = curl_init('http://uae.souq.com/ae-en/iphone/s/');
		curl_setopt($c, CURLOPT_HEADER, false);
		curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; bgft)");
		curl_setopt($c, CURLOPT_FAILONERROR, true);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($c, CURLOPT_AUTOREFERER, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_TIMEOUT, 10);
		// Add curl_setopt here to grab a proxy from your proxy list so that you don't get 403 errors from your IP being banned by the site
		
		// Grab the data.
		$html = curl_exec($c);
curl_close($c);



$pokemon_doc = new DOMDocument();


if(!empty($html)){ //if any html is actually returned

    $pokemon_doc->loadHTML($html);
   
    $pokemon_xpath = new DOMXPath($pokemon_doc);
	echo "<pre>";
	print_r($pokemon_doc);
	exit;
    $pokemon_row = $pokemon_xpath->query("//div[@class='placard']");

    if($pokemon_row->length > 0){
        foreach($pokemon_row as $row){
			print_r($row);
            //echo $row->nodeValue . "<br/>";
        }
		
		foreach ($pokemon_xpath->query('//a[@href]//img') as $img) {

    # find the link by going up til an <a> is found
    # since we only found <img>s inside an <a>, this should always succeed
    for ($link = $img; $link->tagName !== 'a'; $link = $link->parentNode);

    $output[] = array(
        'href' => $link->getAttribute('href'),
        'src'  => $img->getAttribute('src'),
        'alt'  => $img->getAttribute('alt'),
    );
}
		
    }
}

echo "<pre>";
print_r($output);
echo "</pre>";
?>