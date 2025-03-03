<?php
require_once '../core/config.php';
$receiver_id = $mysqli_connect->real_escape_string($_POST['id']);
$text_ = $mysqli_connect->real_escape_string($_POST['text_']);
$user_id = $_SESSION['dvsa_user_id'];

$sql = $mysqli_connect->query("INSERT INTO `tbl_messages`(`text`,  `sender_id`, `receiver_id`) VALUES ('$text_', '$user_id', '$receiver_id')") or die(mysqli_error());
if ($sql) {
    echo 1;
} else {
    echo 0;
}
