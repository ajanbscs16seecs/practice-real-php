
<?php

  function getToken($length){
       $token = "";
       $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
       $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
       $codeAlphabet.= "0123456789";
       $max = strlen($codeAlphabet); // edited

      for ($i=0; $i < $length; $i++) {
          $token .= $codeAlphabet[random_int(0, $max-1)];
      }

      return $token;
  }
$current_time = round(microtime(true) * 1000);

function echoMessageWithStatus($status, $message)
{

    $response["status"]  = $status;
    $response["message"] = $message;
    echo json_encode($response);
}
function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

}













  //
  //
	// $key = base64_encode(openssl_random_pseudo_bytes(32));
  //
  // echo $key;


  $key = "fwPPfGU3DtZ5jXkv22YI6xQGHhNOk0w6vSsDhlJvBvA=";


  function my_encrypt($data, $key) {
      // Remove the base64 encoding from our key
      $encryption_key = base64_decode($key);
      // Generate an initialization vector
      $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
      // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
      $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
      // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
      return base64_encode($encrypted . '::' . $iv);
  }

  function my_decrypt($data, $key) {
      // Remove the base64 encoding from our key
      $encryption_key = base64_decode($key);
      // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
      if(list($encrypted_data, $iv) = explode('::', base64_decode($data), 2)){
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
      }
      else{
        return false;
      }
  }





?>
