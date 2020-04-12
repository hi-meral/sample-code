<?php


function registerInCloud($data)
{
    $cloudUserName = $data["device_token"];
    $cloudPassword = "yahoo@123";
    
    
    $access_app_key = "XXXXXXXXXXXXXXXXXXXXXXXX";
  
    // Create User in cloud
    $curlCloud = curl_init();
    curl_setopt($curlCloud, CURLOPT_URL,"https://api.cloud.appcelerator.com/v1/users/create.json?key=".$access_app_key);
    curl_setopt($curlCloud, CURLOPT_POST, 1);
    curl_setopt($curlCloud, CURLOPT_POSTFIELDS,"username=".$cloudUserName."&password=".$cloudPassword."&password_confirmation=".$cloudPassword);
    curl_setopt($curlCloud, CURLOPT_RETURNTRANSFER, true);
    $dataCloud = curl_exec ($curlCloud);
    curl_close ($curlCloud);
    
    $dataCloud = json_decode($dataCloud);
    $userCloud = $dataCloud->response->users;
}


public function cloudloginAction(){
		
        define(ACS_APP_KEY,"XXXXXXXXXXXXXXXXXXXXXXX");
        define(ACS_ADMIN_USER,"admin");
        define(ACS_ADMIN_PASSWORD,"admin123");
        define(ACS_CHANNEL,"RIT999");
        
        $curlCloud = curl_init();
            curl_setopt($curlCloud, CURLOPT_URL,"https://api.cloud.appcelerator.com/v1/users/login.json?key=".ACS_APP_KEY);
            curl_setopt($curlCloud, CURLOPT_POST, 1);
            curl_setopt($curlCloud, CURLOPT_POSTFIELDS,"login=".ACS_ADMIN_USER."&password=".ACS_ADMIN_PASSWORD);
            curl_setopt($curlCloud, CURLOPT_RETURNTRANSFER, true);
            $dataCloud = curl_exec ($curlCloud);
            curl_close ($curlCloud);
    
            $dataCloud = json_decode($dataCloud);
           
            
            $sess = $dataCloud->meta->session_id;
            
            
            
            $pload["sound"] = "default";
            $pload["alert"] = "A candidate has applied for the job - ";
            //$pload["vibrate"] = "true";
            
            $payload = json_encode($pload);
        
            
            $curlCloud = curl_init();
            curl_setopt($curlCloud, CURLOPT_URL,"https://api.cloud.appcelerator.com/v1/push_notification/notify.json?key=".ACS_APP_KEY."&_session_id=".$sess);
            curl_setopt($curlCloud, CURLOPT_POST, 1);
            curl_setopt($curlCloud, CURLOPT_POSTFIELDS,"to_ids=".$cloud_id."&channel=".ACS_CHANNEL."&payload=".$payload);
            curl_setopt($curlCloud, CURLOPT_RETURNTRANSFER, true);
            $dataCloud = curl_exec ($curlCloud);
            curl_close ($curlCloud);
            
	}

?>