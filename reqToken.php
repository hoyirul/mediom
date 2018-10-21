<?php 
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.medium.com/v1/tokens");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "code=$_SESSION[code]&client_id=eb39146b84b6&client_secret=48e9482bbcedd6818898233d7b150d49ef7cfb0f&grant_type=authorization_code&redirect_uri=https://mediom.000webhostapp.com/callback.php");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);
echo $server_output;

// header("location:index.php");

// echo $server_output;
// Further processing ...

?>