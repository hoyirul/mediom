<?php 
	session_start();

	$_SESSION['state']=$_GET['state'];
	$_SESSION['code']=$_GET['code'];

    //echo $_SESSION['code'];
 	header("location:reqToken.php");
// A very simple PHP example that sends a HTTP POST to a remote site
//

?>