<?php
require_once '../core/config.php';
$email = $_POST['email'];
$username = $_POST['username'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$fetch = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_email = '$email' AND username='$username'");

if ($fetch->num_rows > 0) {
    
    $row = $fetch->fetch_array();
    $otp = random_int(100000, 999999); 
    $mysqli_connect->query("UPDATE tbl_users SET otp='$otp' WHERE user_id='$row[user_id]'") or die(mysqli_error());

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chmsustudentsviolation@gmail.com';  // Replace with your Gmail address
        $mail->Password = 'tyto gder ooct fpze';     // Replace with your app password (not your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;  // Use 465 for SSL or 587 for TLS

        // Recipients
        $mail->setFrom('chmsustudentsviolation@gmail.com', 'CHMSU OSAS');
        $mail->addAddress($email);  // Replace with recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset OTP for CHMSU OSAS - Student Violation';
            $mail->Body    = '
            <h2>Password Reset Request</h2>
            <p>Dear '.strtoupper($row['user_fname'].' '.$row['user_lname']).',</p>
            <p>You have requested to reset your password for the CHMSU OSAS -Student Violation system. Use the OTP below to proceed with your request:</p>
            <h1 style="color: #2c3e50; text-align: center;">' . $otp . '</h1>
            <p>If you did not request this, please ignore this email or contact the administrator.</p>
            <p>Thank you,<br>CHMSU Student Violation Team</p>
        ';
            $mail->AltBody = "Dear ".strtoupper($row['user_fname']." ".$row['user_lname']).",\n\nYou have requested to reset your password for the CHMSU Student Violation system. Use the OTP below to proceed with your request:\n\n" . $otp . "\n\nIf you did not request this, please ignore this email or contact the administrator.\n\nThank you,\nCHMSU - OSAS";

        // Send email
        $mail->send();
        echo 'Email has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo -1;
}
