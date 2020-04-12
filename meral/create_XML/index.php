<?

$imagefiles = array("fb531d7a797c8d42dd58b28dd66b9ab8.jpg","b84615641c7d54a0208a8537366126e0.jpg");

$doc = new DOMDocument(); 
  $doc->formatOutput = true; 

  // CREATE <properties> ELEMENT
  $p = $doc->createElement( "properties" );
        
        // ADD ATTRIBUTE IN <properties> ELEMENT
        $domAttribute = $doc->createAttribute('numberOfCards');
        $domAttribute->value = '12';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('soundPath');
        $domAttribute->value = 'sounds/';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('imagePath');
        $domAttribute->value = 'puzzle_thumbs/';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('imageHeight');
        $domAttribute->value = '100';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('imageWidth');
        $domAttribute->value = '100';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('spacing');
        $domAttribute->value = '15';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('cardRoundEdges');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useBackgroundImage');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useGameTimer');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useGameScore');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useScoreSaving');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('autoCompleteLastCard');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useTurnCardSound');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('useCompletePairSound');
        $domAttribute->value = 'true';
        $p->appendChild($domAttribute);
    
     
    // CREATE <positioning> ELEMENT
    $po = $doc->createElement( "positioning" );
        
        // ADD ATTRIBUTE IN <positioning> ELEMENT
        $domAttribute = $doc->createAttribute('cardDeckX');
        $domAttribute->value = '350';
        $po->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('cardDeckY');
        $domAttribute->value = '220';
        $po->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('gameTimerX');
        $domAttribute->value = '700';
        $po->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('gameTimerY');
        $domAttribute->value = '50';
        $po->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('gameScoreX');
        $domAttribute->value = '700';
        $po->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('gameScoreY');
        $domAttribute->value = '170';
        $po->appendChild($domAttribute);
        
    // CREATE <language> ELEMENT
    $l = $doc->createElement( "language" );
        
        // ADD ATTRIBUTE IN <language> ELEMENT
        $domAttribute = $doc->createAttribute('score');
        $domAttribute->value = 'Score';
        $l->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('timeElapsed');
        $domAttribute->value = 'Time elapsed';
        $l->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('timesWon');
        $domAttribute->value = 'Times won';
        $l->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('bestTime');
        $domAttribute->value = 'Best time';
        $l->appendChild($domAttribute);
        
        
  // CREATE <references> ELEMENT
  $r = $doc->createElement( "references" );
        
        // ADD ATTRIBUTE IN <references> ELEMENT
        $domAttribute = $doc->createAttribute('backside');
        $domAttribute->value = 'NAC_LOGO_150wd.jpg';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('backgroundImage');
        $domAttribute->value = 'Memory_Game_Background.jpg';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('turnCardSound');
        $domAttribute->value = 'turn_card.mp3';
        $r->appendChild($domAttribute);
        
        $domAttribute = $doc->createAttribute('completePairSound');
        $domAttribute->value = 'complete_pair.mp3';
        $r->appendChild($domAttribute);
        
      
  foreach($imagefiles as $imgf)
  {
    // CREATE <card> ELEMENT
    $c = $doc->createElement( "card" ); 

    // ADD ATTRIBUTE IN <references> ELEMENT
    $domAttribute = $doc->createAttribute('url');
    $domAttribute->value = $imgf;
    $c->appendChild($domAttribute);
   
    // ADD <card> to <references>
    $r->appendChild( $c );
  }
  
  // CREATE <data> ELEMENT
  $d = $doc->createElement( "data" );
  
        // ADD <properties> to <data>
        $d->appendChild( $p );
        
        // ADD <positioning> to <data>
        $d->appendChild( $po );
        
        // ADD <language> to <data>
        $d->appendChild( $l );
        
        // ADD <reference> to <data>
        $d->appendChild( $r );
  
 
  // add <data> to file 
  $doc->appendChild( $d );
  
  $doc->saveXML(); 
  echo $doc->save("puzzle.xml");
?>