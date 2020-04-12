<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script>
            
            
            $(document).ready(function(){
            
                $.ajax({
                    url: "adv5.php",
                    type:"get",
                    success: function(data){
                       $('#abc').html(data);
                    }
                });
                
                
                
                $('#button').click(function(){
                
                    $.ajax({
                    url: "adv5.php",
                    type:"get",
                    success: function(data){
                       $('#xyz').append(data);
                    }
                    });    
                });
            })
        </script>
    </head>
    
    <body>
        <input type="button" id="button" value="Get Banner" >
            <div >
                <pre>
                        <h1>This is a example of loading the GOOGLE Ad-sense using Ajax</h1>
                </pre>
            </div>
        <div id="abc"></div>
        
        <div id="xyz"></div>
        
        
        
    </body>
</html>