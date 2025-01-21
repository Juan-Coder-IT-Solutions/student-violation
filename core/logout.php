<?php 
require_once '../core/config.php';

// unset($_SESSION['dvsa_user_id']);
// unset($_SESSION['user_category']);

unset($_SESSION['error']);
session_destroy();
header("Location: ../index.php");

?>