<?php
session_start();

$hostname = "localhost";
$database = "amhc_db";
$username = "root";
$password = "";

//AES encryption funtion
function encrypt_decrypt($action, $string) {
  $output = false;

  $encrypt_method = "AES-256-CBC";
  $secret_key = 'GeykZone2366';
  $secret_iv = 'mara114136';

  $key = hash('sha256', $secret_key);

  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if ( $action == 'encrypt' ) {
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
  } else if( $action == 'decrypt' ) {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }

  return $output;
}
//AES encryption funtion end


$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
 ?>