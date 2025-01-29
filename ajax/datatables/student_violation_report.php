<?php
require_once '../../core/config.php';

$student_id = $_POST['student_id'];

$fetch_products = $mysqli_connect->query("SELECT * FROM tbl_offenses o LEFT JOIN tbl_students s ON s.student_id=o.student_id LEFT JOIN tbl_violations v ON v.violation_id=o.violation_id WHERE s.student_id='$student_id'") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list                       = array(); 
    $list['count']              = $count++;
    $list['violation_id']       = $row['violation_id'];    
    $list['student']            = $row['student_fname'] . " " . $row['student_mname'] . " " . $row['student_lname'];
    $list['violation_name']     = $row['violation_name'];
    $list['offense_date']       = $row['offense_date'];
    $list['violation_desc']     = $row['violation_desc'];
    $list['offense_type']       = $row['offense_type'];
    $list['discplinary_action'] = $row['discplinary_action'];
    $list['offense_remarks']    = $row['offense_remarks'];

    
    $list['date_added']         = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>