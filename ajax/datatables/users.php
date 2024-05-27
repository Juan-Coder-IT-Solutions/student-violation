<?php
require_once '../../core/config.php';
$fetch = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_category !='S'") or die(mysqli_error());
$response['data'] = array();
$count = 1;
// $user_id = $_SESSION['rm_user_id'];
while( $row = $fetch->fetch_array() ){

    if($row['user_category'] == "S"){
        $category = "Students";
    }else{
        $category = "Admin";
    }
    
	$list = array(); 
    $list['count'] = $count++;
    $list['user_id'] = $row['user_id'];
    $list['username'] = $row['username'];
    $list['full_name'] = $row['user_fname']." ".$row['user_mname']." ".$row['user_lname'];
    $list['category'] = $category;
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>