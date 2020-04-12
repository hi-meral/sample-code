<?php


importUser();

function importUser()
{
    $directory = './user/';
    if ($handle = opendir($directory)) {
       
    
        /* This is the correct way to loop over the directory. */
        while (false !== ($entry = readdir($handle))) {
            
            if(strstr($entry,'txt'))
            {
                
            $myFile = $directory.$entry;
            $fh = fopen($myFile, 'r');
            $theData = fread($fh, filesize($myFile));
            fclose($fh);
            $theData;
        
        
            $newData = explode('#####',$theData);
            
            foreach($newData as $nd)
            {
                $arr = explode('*@*',$nd);
                
                $value = @unserialize($arr[1]);
                
                if($value=="")
                    $value = $arr[1];
                    
                $final[$arr[0]] = $value;
                
            }
            echo "<pre>";
            print_r($final);
            echo "<hr>";
            }
            
            
        }
    
    
        closedir($handle);
    }

}
    
    
    
    //$arr = unserialize(urldecode($strenc));
    
?>