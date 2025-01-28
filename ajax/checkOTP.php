<?php

require_once '../core/config.php';
$email = $_POST['email'];
$username = $_POST['username'];
$otp = $_POST['otp'];

$fetch = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_email = '$email' AND username='$username' AND otp='$otp'");
if($fetch->num_rows > 0){
    $row = $fetch->fetch_array();
    echo $row['user_id'];
}else{
    echo 0;
}

?>