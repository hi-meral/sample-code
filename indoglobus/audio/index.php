<?php

######################################################
##
## https://www.dev-metal.com/composer-tutorial/
##
######################################################


//require 'vendor/autoload.php';


use function \vendor\GuzzleHttp\Psr7\stream_for;
use \vendor\GuzzleHttp\RequestOptions;
use \vendor\GuzzleHttp\Client;

$tmpFile  = tempnam(sys_get_temp_dir(), uniqid(strftime('%G-%m-%d')));
        $resource = fopen($tmpFile, 'w');
        $stream   = stream_for($resource);

        $client   = new Client();
        $options  = [
            RequestOptions::SINK            => $stream, // the body of a response
            RequestOptions::CONNECT_TIMEOUT => 10.0,    // request
            RequestOptions::TIMEOUT         => 60.0,    // response
            ['headers' => ['Content-Type' => 'audio/x-wav']]

        ];

        //$response = $client->request('GET', 'https://api.twilio.com/'.$date."/".$accounts."/".$account_no."/".$recordings."/".$recording_no.'.wav', $options);

        $response = $client->request('GET', 'http://www.externalharddrive.com/waves/animal/bird.wav', $options);

        $stream->close();
        //fclose($resource);

        if ($response->getStatusCode() === 200) {
            echo file_get_contents($tmpFile); // content
        }