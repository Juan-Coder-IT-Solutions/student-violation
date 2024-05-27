<?php
require_once '../core/config.php';
$violation_name = $mysqli_connect->real_escape_string($_POST['violation_name']);
$violation_desc = $mysqli_connect->real_escape_string($_POST['violation_desc']);
$type = $mysqli_connect->real_escape_string($_POST['type']);
// $user_id  = $_SESSION['rm_user_id'];

$violation_id = $mysqli_connect->real_escape_string($_POST['violation_id']);
$date = getCurrentDate();

if($type == "add"){
    
    $checker = $mysqli_connect->query("SELECT * FROM tbl_violations WHERE violation_name='$violation_name'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();

    if ($count_rows && $count_rows[0] > 0) {
        echo 2;
    }else{
        $sql = $mysqli_connect->query("INSERT INTO tbl_violations SET violation_name='$violation_name',violation_desc='$violation_desc',date_added='$date'") or die(mysqli_error());
       
        if($sql){
            $t_id = $mysqli_connect->insert_id;
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $checker = $mysqli_connect->query("SELECT * FROM tbl_violations WHERE violation_name='$violation_name' AND violation_id  != '$violation_id'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("UPDATE tbl_violations SET violation_name='$violation_name', violation_desc='$violation_desc' WHERE violation_id ='$violation_id'") or die(mysqli_error());
        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>
