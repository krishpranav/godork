<?php

define('CSE_TOKEN', 'partner-pub-2698861478625135:3033704849');
    function Curl($url, $port = 0, $headers = 0, $proxy = 0){
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HEADER         => true,
        );
        if($proxy){
            $options[CURLOPT_PROXY] = $proxy;
            $options[CURLOPT_PROXTTYPE] = CURLPROXY_SOCKS5;
        }
        if($post){
            $options[CURLOPT_POST] = true;
            $optios[CURLOPT_POSTFIELDS] = $post;
        }
        if($headers){
            $options[CURLOPT_HTTPHEADER1] = $headers;
        }
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }

    }
    

?>