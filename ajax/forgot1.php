<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

// Generate a random 6-digit OTP
$otp = random_int(100000, 999999);

try {
    // Server settings
    $mail->SMTPDebug = 2;                                  // Debug level (2 = client/server messages)
    $mail->isSMTP();                                       // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
    $mail->Username   = 'chmsustudentsviolation@gmail.com'; // SMTP username
    $mail->Password   = 'tyto gder ooct fpze';             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       // Enable implicit TLS encryption
    $mail->Port       = 465;                               // TCP port to connect to

    // Recipients
    $mail->setFrom('chmsustudentsviolation@gmail.com', 'CHMSU Student Violation');
    $mail->addAddress('jacildokaye@gmail.com', 'Carlos Hilado Memorial State University Student'); // Add a recipient

    // Email content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset OTP for CHMSU Student Violation';
    $mail->Body    = '
        <h2>Password Reset Request</h2>
        <p>Dear Student,</p>
        <p>You have requested to reset your password for the CHMSU Student Violation system. Use the OTP below to proceed with your request:</p>
        <h1 style="color: #2c3e50; text-align: center;">' . $otp . '</h1>
        <p>If you did not request this, please ignore this email or contact the administrator.</p>
        <p>Thank you,<br>CHMSU Student Violation Team</p>
    ';
    $mail->AltBody = "Dear Student,\n\nYou have requested to reset your password for the CHMSU Student Violation system. Use the OTP below to proceed with your request:\n\n" . $otp . "\n\nIf you did not request this, please ignore this email or contact the administrator.\n\nThank you,\nCHMSU Student Violation Team";

    // Send the email
    $mail->send();
    echo 'OTP has been sent to your email address.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
