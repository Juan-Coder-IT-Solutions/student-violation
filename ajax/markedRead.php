<?php
require_once '../core/config.php';
$notification_id = $mysqli_connect->real_escape_string($_POST['id']);

$sql = $mysqli_connect->query("UPDATE tbl_notifications SET status='0' WHERE notification_id ='$notification_id'") or die(mysqli_error());
if ($sql) {
    echo 1;
} else {
    echo 0;
}
