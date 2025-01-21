<?php
require_once '../core/config.php';
$offense_id = $mysqli_connect->real_escape_string($_POST['id']);

$fetch_row = $mysqli_connect->query("SELECT * FROM tbl_offenses WHERE offense_id='$offense_id'") or die(mysqli_error());
$row = $fetch_row->fetch_array();

$s_row = getStudentRow($row['student_id']);
$student_name = $s_row['student_fname'] . " " . $s_row['student_mname'] . " " . $s_row['student_lname'];

$list['offense_id'] = $row['offense_id'];
$list['violation'] = violation_name($row['violation_id']);
$list['student_name'] = $student_name;
$list['student_course'] = course_name($s_row['course_id']);
$list['year_level'] = $s_row['year_level'];
$list['student_email'] = $s_row['student_email'];
$list['section'] = $s_row['section'];
$list['discplinary_action'] = $row['discplinary_action'];
$list['offense_remarks'] = $row['offense_remarks'];
$list['offense_date'] = date('F d,Y', strtotime($row['offense_date']));
$list['date_added'] = date('F d,Y', strtotime($row['date_added']));
$list['offense_status'] = $row['offense_status'] == 1 ? "<b style='color:green'>CLEARED</b>" : "<i style='color:orange'>NOT-CLEARED</i>";
$list['cleared_by'] = $row['cleared_by'] > 0 ? getUser($row['cleared_by']) : "---";

echo json_encode($list);