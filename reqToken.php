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
$server_output = json_decode($server_output, TRUE);

echo "<pre>";
print_r($server_output);
echo "</pre>";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<br />
<div class="container">
<form action="input.php" method="post">
  <input type="hidden" name="token_type" value="<?= $server_output['token_type']; ?>">
  <input type="hidden" name="access_token" value="<?= $server_output['access_token']; ?>">
  <input type="hidden" name="refresh_token" value="<?= $server_output['refresh_token']; ?>">
  <input type="hidden" name="expires_at" value="<?= $server_output['expires_at']; ?>">
  <input type="hidden" name="code" value="<?= $_SESSION['code']; ?>">
  <button type="submit" name="btn-lanjut" class="btn btn-primary pull-center">Lanjut</button>
</form>
</div>
</body>
</html>