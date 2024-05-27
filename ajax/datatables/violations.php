<?php
require_once '../../core/config.php';
$fetch_products = $mysqli_connect->query("SELECT * FROM tbl_violations") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list = array(); 
    $list['count'] = $count++;
    $list['violation_id'] = $row['violation_id'];
    $list['violation_name'] = $row['violation_name'];
    $list['violation_desc'] = $row['violation_desc'];
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>