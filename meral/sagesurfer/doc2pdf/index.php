<?php

echo "<pre>";
print_r(get_loaded_extensions());
exit;
 $word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
  $word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
  $word->DisplayAlerts = 0;
  // open the word 2007-2013 document 
  $word->Documents->Open('D:\wamp\www\meral\sagesurfer\doc2pdf\mydoc.docx');
  // save it as word 2003
//  $word->ActiveDocument->SaveAs('newdocument.doc');
  // convert word 2007-2013 to PDF
  $word->ActiveDocument->ExportAsFixedFormat('D:\wamp\www\meral\sagesurfer\doc2pdf\new-created.pdf', 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  

  // quit the Word process
  $word->Quit(false);
  // clean up
  unset($word);
  
  
echo 'done';
  ?>
  
  <?php
  
  /*
echo "<p>Word Test Loaded</p>";
 
$filename = "D:\wamp\www\meral\sagesurfer\doc2pdf\mydoc.docx";
 
if (file_exists($filename)) {
 
	echo "<p>The file $filename exists</p>";
 
	$word = new COM("word.application") or die ("Could not initialise MS Word object.");
	$word->Visible = 0;
 
	print "Loaded Word, version {$word->Version}\n";
 
	$word->Documents->Open($filename);
 
//	$word->Documents->Open(realpath("$filename")) or die ("Unable to open File");
 
	// Extract content.
	
	print "Document opened, version {$word->Version}\n\n\n";
	
	$content = (string) $word->ActiveDocument->Content;
 
	echo $content;
 
	$word->ActiveDocument->Close(false);
 
	$word->Quit();
	$word = null;
	unset($word);
 
	echo "<p>Word Closed</p>";
 
} else {
	echo "<p>The file $filename does not exist</p>";
}
*/
?>