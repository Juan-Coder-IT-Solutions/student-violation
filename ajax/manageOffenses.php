<?php
require_once '../core/config.php';
$student_id = $mysqli_connect->real_escape_string($_POST['student_id']);
$violation_id = $mysqli_connect->real_escape_string($_POST['violation_id']);
// $violation_id = $mysqli_connect->real_escape_string($_POST['violation_id']);
$offense_date = $mysqli_connect->real_escape_string($_POST['offense_date']);
$offense_type = $mysqli_connect->real_escape_string($_POST['offense_type']);
$discplinary_action = $mysqli_connect->real_escape_string($_POST['discplinary_action']);
$offense_remarks = $mysqli_connect->real_escape_string($_POST['offense_remarks']);
// $offense_status = $mysqli_connect->real_escape_string($_POST['offense_status']);
$type = $mysqli_connect->real_escape_string($_POST['type']);

$offense_id = $mysqli_connect->real_escape_string($_POST['offense_id']);
$date = getCurrentDate();

if ($type == "add") {

    $sql = $mysqli_connect->query("INSERT INTO tbl_offenses SET student_id='$student_id',offense_date='$offense_date',offense_remarks='$offense_remarks', date_added='$date', violation_id='$violation_id', discplinary_action='$discplinary_action',offense_type='$offense_type'") or die(mysqli_error());

    if ($sql) {
        $t_id = $mysqli_connect->insert_id;
        echo 1;
    } else {
        echo 0;
    }
} else {
    $sql = $mysqli_connect->query("UPDATE tbl_offenses SET student_id='$student_id', offense_date='$offense_date', offense_remarks='$offense_remarks',violation_id='$violation_id',discplinary_action='$discplinary_action',offense_type='$offense_type' WHERE offense_id ='$offense_id'") or die(mysqli_error());
    if ($sql) {
        echo 1;
    } else {
        echo 0;
    }
}
