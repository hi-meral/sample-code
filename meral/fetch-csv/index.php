<?php


mysql_connect("localhost","root","");
mysql_select_db("test");


$row = 1;
if (($handle = fopen("category.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        
        if($data[1]!="")
        {
          echo  $query = "INSERT INTO subcategory (name,pid) VALUES ('$data[1]',$data[3])";
          mysql_query($query);
          //for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "-";
          //}
        
        echo "<br>";
        }
    }
    fclose($handle);
}
?>