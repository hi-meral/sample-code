<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script>
            
            $.post('basic.php', function(data) {
                $('.result').html(data);
              });
        </script>
        
    </head>
    <body>
        
        
        <form action="basic.php" name="form1" id="form1" method="post" enctype="multipart/form-data" >
            
            <input type="file" name="new" id="new" />
            <input type="submit" name="sub1" value="Upload" />
            
        </form>
    </body>
</html>