<?php
require_once '../core/config.php';
$first_name = $mysqli_connect->real_escape_string($_POST['first_name']);
$middle_name = $mysqli_connect->real_escape_string($_POST['middle_name']);
$last_name = $mysqli_connect->real_escape_string($_POST['last_name']);
$username = $mysqli_connect->real_escape_string($_POST['username']);
$user_email = $mysqli_connect->real_escape_string($_POST['user_email']);
$user_id  = $_SESSION['dvsa_user_id'];

$checker_email = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_email='$user_email' AND user_id  != '$user_id '") or die(mysqli_error());
if($checker_email->num_rows <= 0){
    $checker = $mysqli_connect->query("SELECT * FROM tbl_users WHERE username='$username' AND user_id  != '$user_id '") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("UPDATE tbl_users SET user_fname='$first_name',user_mname='$middle_name',user_lname='$last_name', username='$username', user_email='$user_email' WHERE user_id ='$user_id '") or die(mysqli_error());
        if($sql){
            $user_category = $_SESSION['user_category'];

            if($user_category == 'S'){
                $mysqli_connect->query("UPDATE tbl_students SET student_fname='$first_name',student_mname='$middle_name',student_lname='$last_name', student_email='$user_email' WHERE user_id ='$user_id '") or die(mysqli_error());
            }
            
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    echo -1;
}
?>
