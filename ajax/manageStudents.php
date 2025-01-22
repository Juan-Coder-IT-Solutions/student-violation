<?php
require_once '../core/config.php';
$student_fname = $mysqli_connect->real_escape_string($_POST['student_fname']);
$student_mname = $mysqli_connect->real_escape_string($_POST['student_mname']);
$student_lname = $mysqli_connect->real_escape_string($_POST['student_lname']);
$student_email = $mysqli_connect->real_escape_string($_POST['student_email']);
$course_id = $mysqli_connect->real_escape_string($_POST['course_id']);
$year_level = $mysqli_connect->real_escape_string($_POST['year_level']);
$section = $mysqli_connect->real_escape_string($_POST['section']);
$username = $mysqli_connect->real_escape_string($_POST['username']);
$password = $mysqli_connect->real_escape_string($_POST['password']);
$type = $mysqli_connect->real_escape_string($_POST['type']);
$student_id  = $mysqli_connect->real_escape_string($_POST['student_id']);

$date = getCurrentDate();

if($type == "add"){
    
    $checker = $mysqli_connect->query("SELECT * FROM tbl_students WHERE student_fname='$student_fname' AND student_mname='$student_mname' AND student_lname='$student_lname'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        
        $sql = $mysqli_connect->query("INSERT INTO tbl_users SET user_fname='$student_fname',user_mname='$student_mname',user_lname='$student_lname', user_category='S', username='$username', password=md5('$password'), date_added='$date'") or die(mysqli_error());
        if($sql){
            
            $user_id = $mysqli_connect->insert_id;
            $mysqli_connect->query("INSERT INTO tbl_students SET student_fname='$student_fname',student_mname='$student_mname',student_lname='$student_lname',course_id='$course_id',student_email='$student_email', date_added='$date', user_id='$user_id', section='$section', year_level='$year_level'") or die(mysqli_error());

            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $checker = $mysqli_connect->query("SELECT * FROM tbl_students WHERE student_fname='$student_fname' AND student_mname='$student_mname' AND student_lname='$student_lname' AND student_id != '$student_id'") or die(mysqli_error());
    if($checker->num_rows > 0){
        echo 2;
    }else{
        $fetch = $mysqli_connect->query("SELECT * FROM tbl_students WHERE student_id = '$student_id'") or die(mysqli_error());
        $row = $fetch->fetch_array();
        $user_id = $row['user_id'];
        $sql = $mysqli_connect->query("UPDATE tbl_students SET student_fname='$student_fname',student_mname='$student_mname',student_lname='$student_lname', user_id='$user_id', year_level='$year_level', section='$section',student_email='$student_email' WHERE student_id ='$student_id'") or die(mysqli_error());
        if($sql){
            $mysqli_connect->query("UPDATE tbl_users SET user_fname='$student_fname',user_mname='$student_mname',user_lname='$student_lname'  WHERE user_id ='$user_id'");
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>
