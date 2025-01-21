<?php
require_once '../core/config.php';

if (isset($_POST['offense_id'])) {
    $offense_id = $_POST['offense_id'];

    $query = $mysqli_connect->query("UPDATE tbl_offenses SET offense_status='1' WHERE offense_id='$offense_id'") or die(mysqli_error());
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}
