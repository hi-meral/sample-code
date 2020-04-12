 <?php
        session_start();
        
        $ch = curl_init("https://graph.facebook.com/oauth/exchange_sessions");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "type" => "client_cred",
            "client_id" => "201511013198500",
            "client_secret" => "f30006138845fd41db4745512aab357b",
            "sessions" => "c4395c7e53dbed684d986e00e6afe28f"
        ));
         
         
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        
        $result = json_decode(curl_exec($ch));
        print_r($result);
        
        $accessToken = $result[0]->access_token;

        $fbconfig['appid']  = "201511013198500";
        $fbconfig['apikey']  = "c4395c7e53dbed684d986e00e6afe28f";
	$fbconfig['secret']  = "f30006138845fd41db4745512aab357b";
        
        // Create our Application instance.
        $facebook = new Facebook(array(
          'appId'  => $fbconfig['apikey'],
          'secret' => $fbconfig['secret'],
          'cookie' => true,
        ));
        
        $session = $facebook->getSession();
       
        ?>
<html>
<head>
  <style>p { color:red; }</style>
  <script src="http://code.jquery.com/jquery-1.5.js"></script>
  <script>
 
        $(document).ready(function () {
           
               $.ajax({
                url: "https://graph.facebook.com/oauth/access_token?client_id=201511013198500&client_secret=f30006138845fd41db4745512aab357b&grant_type=client_credentials",
                context: document.body,
                success: function(){
                  $(this).addClass("done");
                }
              });
            
        });
        
        
        
    </script>
  </head>
<body>
    
    
    
    </body>
</html>