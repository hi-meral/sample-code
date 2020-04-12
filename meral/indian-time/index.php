
    <style>
    
        #t{
            font-size:50px;
            margin:100px;
            padding:50px;
            color:#FFF;
            background-color:#000;
            width:40%;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>    
        
            
        $(document).ready(function(){
           
            setInterval("$('#t').load('time.php')",1000);
            
        })
           
    </script>
    
    <div id="t" ></div>
    
    <br /><br />
 