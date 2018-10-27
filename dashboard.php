<?php
session_start();
include 'config.php';
$curl = curl_init();

$sql = mysqli_query($conn,"SELECT * FROM gettoken WHERE code='$_SESSION[code]'");

foreach($sql as $row){

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.medium.com/v1/me",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer ".$row['access_token'],
    "cache-control: no-cache"
  ),
));
}
$response = curl_exec($curl);
$err = curl_error($curl);

// $_SESSION['id']=$response['id'];

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $response = json_decode($response, TRUE);
  echo "<pre>";
    print_r($response);
  echo "</pre>";
}

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
<div class="container">
<p style="color:red;">silahkan copy id di atas dan paste di form yang di sediakan...</p>
<form action="input.php" method="post">
    <input type="hidden" name="code" value="<?php echo $_SESSION['code']; ?>" />
    <div class="form-group">
        <input type="text" name="id" required="" class="form-control" placeholder="masukaan id.."/>
    </div>
    <button type="submit" name="btn-id" class="btn btn-danger">Lanjut lagi</button>
</form>
</div>
</body>
</html>
