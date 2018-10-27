<?php
    session_start();
    include 'config.php';
    
    $sql = mysqli_query($conn,"SELECT * FROM gettoken WHERE code='$_SESSION[code]'");
    $query = mysqli_query($conn,"SELECT * FROM users WHERE code='$_SESSION[code]'");
    
    
    if (isset($_POST['submit_post'])) {
			$ch = curl_init();

			$data = [
				"title" => $_POST['title'],
				"contentFormat" => "html",
				"content" => $_POST['content'],
				"canonicalUrl" =>  "http://kerjasama.com/posts/" . $_POST['title'],
				"tags" => explode(',', $_POST['tags']),
				"publishStatus" =>  "public"
			];
            
            
            foreach($query as $row){
			curl_setopt($ch, CURLOPT_URL,"https://api.medium.com/v1/users/".$row['id']."/posts");
            }
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			foreach($sql as $me){
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '.$me['access_token']
			));
			}
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$server_output = curl_exec($ch);

			curl_close ($ch);

			echo "<pre>";
			print_r(json_decode($server_output));
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
    <br />
    <h2 align="center">Mediom API</h2>
	<form method='post'>
	    <div class="col-md-6">
    	    <div class="form-group">
        	    <input type='text' name='title' placeholder='Title' required="" class="form-control">
        	</div>
    	</div>
    	<div class="col-md-6">
        	<div class="form-group">
        	    <textarea name='content' placeholder='Content' required="" class="form-control"></textarea>
        	</div>
    	</div>
    	<div class="col-md-6">
        	<div class="form-group">
        	    <input type='text' name='tags' placeholder='Tags' required="" class="form-control">
        	</div>
    	</div>
    	<div class="col-md-6">
        	<div class="form-group">
        	    <button type='submit' name='submit_post' class="btn btn-primary">submit</button>
        	</div>
    	</div>
	</form>
	</div>
</body>
</html>

