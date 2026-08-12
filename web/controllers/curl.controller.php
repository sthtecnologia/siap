<?php

Class CurlController{

 static public function request($url,$method,$fields){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://api.academy.com/'.$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_POSTFIELDS => $fields,
      CURLOPT_HTTPHEADER => array(
        'Authorization: sfgfgdfhdfhdgfhrtwertwedsfasdfasde'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    $response = json_decode($response);

    return $response;

  }

  /*=============================================
  Peticiones a la API de PayPal
  =============================================*/ 

  static public function paypal($url,$method,$fields){

    $clientId = "";
    $secret = "";

    $basic = base64_encode($clientId.":".$secret);

    $endpoint = 'https://api-m.sandbox.paypal.com/'; //Endpoint modo Sandbox
    // $endpoint = 'https://api-m.paypal.com/'; //Endpoint modo Live
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $endpoint.'v1/oauth2/token',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic '.$basic
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response);

    if(isset($response->access_token)){

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $endpoint.$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS =>$fields,
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer '.$response->access_token,
          'PayPal-Request-Id: '.time().rand(10,1000),
          'Content-Type: application/json'
        ),
      ));

      $response = curl_exec($curl);
    
      curl_close($curl);
      
      $response = json_decode($response);

      return $response;
    }

   


  }

}