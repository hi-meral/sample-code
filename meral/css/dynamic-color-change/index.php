

<HTML>
  <HEAD>
    <LINK id="color" href="style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script>
        
        $(document).ready(function(){
                alert('aaaaaaa');
                
                 $('#btn').click(function(){
                    alert('bbbb');
                    
                    var style = $("#color");
                    var cookieOptions = {expires: 7, path: '/'};		
                    var cookieValue = "red.css";
                    var cookieName = 'css_color';		
    
                   alert(cookieValue);
                    style.attr("href", cookieValue + ".css");
                    setCookie(cookieName,cookieValue,7);
                    return false;
                });
        });
        
        </script>
  </HEAD>
  <BODY>
    <div class="abc" id="1">
        MERAL
    </div>
    <div class="xyz" id="2">
        
    </div>
    <div>
        <input type="button" name="btn" id="btn"  value="click" />
    </div>
  </BODY>
</HTML>