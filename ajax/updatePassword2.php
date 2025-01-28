<?php
require_once '../core/config.php';
$user_id = $mysqli_connect->real_escape_string($_POST['user_id']);
$password = $mysqli_connect->real_escape_string($_POST['password']);

$sql = $mysqli_connect->query("UPDATE tbl_users SET password=md5('$password') WHERE user_id ='$user_id'") or die(mysqli_error());
if ($sql) {
    echo 1;
} else {
    echo 0;
}

