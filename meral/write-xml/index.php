<?php

    
  $employees = array();
  
  $employees [] = array( 
  'name' => 'Albert', 
  'age' => '34', 
  'salary' => "$10000" 
  );
  
  $employees [] = array( 
  'name' => 'Claud', 
  'age' => '20', 
  'salary' => "$2000" 
  ); 
   
  $doc = new DOMDocument(); 
  $doc->formatOutput = true; 
   
  $r = $doc->createElement( "puzzle" );
        
        $domAttribute = $doc->createAttribute('puzzle_sizes');
        $domAttribute->value = '2,3,4,5,6,8,10,12';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('default_size');
        $domAttribute->value = '3';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('image_folder');
        $domAttribute->value = 'artist_images';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('thumbnail_folder');
        $domAttribute->value = 'artist_thumbs';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('time_per_piece');
        $domAttribute->value = '7';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('hint');
        $domAttribute->value = 'true';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('shadow_effect');
        $domAttribute->value = 'true';
        $r->appendChild($domAttribute);
        
  $doc->appendChild( $r ); 
   
  foreach( $employees as $employee ) 
  { 
    $b = $doc->createElement( "image" ); 

    $b->appendChild($doc->createTextNode( $employee['name'] )); 
   
    $r->appendChild( $b );
  } 
   
  echo $doc->saveXML(); 
  $doc->save("puzzle.xml") 
  ?>