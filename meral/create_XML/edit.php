<?php

    $cn = mysql_connect("localhost","root","");
    $cn = mysql_select_db("sasknac");
    
    // fetch data from funstuff_quiz_data
	$query = "SELECT * FROM funstuff_quiz_question WHERE game_id='".$_GET['id']."'";
	$result = mysql_query($query);
	
    
    
$doc=new DomDocument();
$doc->Load("demoquiz.xml");
$quiz=$doc->documentElement;
 
    $qs = $doc->createElement("questions");
            
            while($row = mysql_fetch_object($result)){
                
                $q = $doc->createElement("question");
                
                
                //ADD ATTRIBUTE <question> IN <question> ELEMENT
                $domAttribute = $doc->createAttribute('question');
                $domAttribute->value = $row->question;
                $q->appendChild($domAttribute);
                
                //ADD ATTRIBUTE <images> IN <question> ELEMENT
                $domAttribute = $doc->createAttribute('images');
                $domAttribute->value = $row->is_image;
                $q->appendChild($domAttribute);
                
                        $answers = unserialize($row->answers);
                        $answers_images = unserialize($row->images);
                        
                        $imgC = 0;
                        foreach($answers as $ansK=>$ansV){
                            $a = $doc->createElement("answer");
                            
                            if($row->is_image=="yes"){
                                //ADD ATTRIBUTE <images> IN <answer> ELEMENT
                                $domAttribute = $doc->createAttribute('image');
                                $domAttribute->value = "images/".$answers_images[$imgC];
                                $a->appendChild($domAttribute);
                            }

                            $textNode = ($ansV=="yes")?"!!@":"";
                            $textNode .= $ansK;

                            $a->appendChild($doc->createTextNode($textNode));

                            $q->appendChild( $a );
                            
                            $imgC++;
                        }
                        
                $qs->appendChild( $q );
            }
    $quiz->appendChild( $qs );



$doc->Save("prequiz.xml");


$stringData = file_get_contents("prequiz.xml");

$_search = array("scoretwentyfive","scorefifty","scoreseventyfive","scoreninetynine","scorehundred");
$_replace = array("0-25","25-50","50-75","75-99","100");

$stringData = str_replace($_search,$_replace,$stringData);


$myFile = "quiz.xml";
$fh = fopen($myFile, 'w');
fwrite($fh, $stringData);
fclose($fh);

?>