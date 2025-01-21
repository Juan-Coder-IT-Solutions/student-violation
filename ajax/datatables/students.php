<?php
require_once '../../core/config.php';
$fetch = $mysqli_connect->query("SELECT * FROM tbl_students") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch->fetch_array() ){

    
	$list = array(); 
    $list['count'] = $count++;
    $list['student_id'] = $row['student_id'];
    $list['course'] = course_name($row['course_id']);
    $list['section'] = $row['section'];
    $list['year_level'] = $row['year_level'];
    $list['full_name'] = $row['student_fname']." ".$row['student_mname']." ".$row['student_lname'];
    $list['student_email'] = $row['student_email'];
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>