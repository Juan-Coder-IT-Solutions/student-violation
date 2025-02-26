<?php
require_once '../core/config.php';
$degree_name = $mysqli_connect->real_escape_string($_POST['degree_name']);
$type = $mysqli_connect->real_escape_string($_POST['type']);
// $user_id  = $_SESSION['rm_user_id'];

$degree_id = $mysqli_connect->real_escape_string($_POST['degree_id']);
$date = getCurrentDate();

if($type == "add"){
    
    $checker = $mysqli_connect->query("SELECT * FROM tbl_degree WHERE degree_name='$degree_name'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();

    if ($count_rows && $count_rows[0] > 0) {
        echo 2;
    }else{
        $sql = $mysqli_connect->query("INSERT INTO tbl_degree SET degree_name='$degree_name',date_added='$date'") or die(mysqli_error());
       
        if($sql){
            $t_id = $mysqli_connect->insert_id;
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $checker = $mysqli_connect->query("SELECT * FROM tbl_degree WHERE degree_name='$degree_name' AND degree_id  != '$degree_id'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("UPDATE tbl_degree SET degree_name='$degree_name' WHERE degree_id ='$degree_id'") or die(mysqli_error());
        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>
