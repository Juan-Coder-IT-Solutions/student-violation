<?php
require_once '../core/config.php';

	$username1 = $_POST['username'];
	$password1 = $_POST['password'];

	$host 	  = host;
	$username = username;
	$password = password;
	$database = database;
	$user_connect = new mysqli($host, $username, $password, $database);

	$query = "SELECT * FROM ";
	$query .= table;
	$query .=" WHERE username = '$username1' AND password = md5('$password1')";

	$result = $user_connect->query($query) or die (mysqli_error());

	if($result->num_rows == 1){
	

		$row = $result->fetch_assoc();
		$_SESSION['dvsa_user_id'] = $row['user_id'];
		$_SESSION['user_category'] = $row['user_category'];
		
		echo 1;
		exit;

		$user_connect->close();
	}else {
		$_SESSION['error']  = error_message;
		echo "Account not valid";
		//header("Location:../auth/login.php");
		exit;
	}

?>