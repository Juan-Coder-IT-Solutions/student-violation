<?php
require_once '../core/config.php';
$course_name = $mysqli_connect->real_escape_string($_POST['course_name']);
$type = $mysqli_connect->real_escape_string($_POST['type']);
// $user_id  = $_SESSION['rm_user_id'];

$course_id = $mysqli_connect->real_escape_string($_POST['course_id']);
$date = getCurrentDate();

if($type == "add"){
    
    $checker = $mysqli_connect->query("SELECT * FROM tbl_courses WHERE course_name='$course_name'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();

    if ($count_rows && $count_rows[0] > 0) {
        echo 2;
    }else{
        $sql = $mysqli_connect->query("INSERT INTO tbl_courses SET course_name='$course_name',date_added='$date'") or die(mysqli_error());
       
        if($sql){
            $t_id = $mysqli_connect->insert_id;
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $checker = $mysqli_connect->query("SELECT * FROM tbl_courses WHERE course_name='$course_name' AND course_id  != '$course_id'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("UPDATE tbl_courses SET course_name='$course_name' WHERE course_id ='$course_id'") or die(mysqli_error());
        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>
