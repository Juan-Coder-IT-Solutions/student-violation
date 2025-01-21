<?php
require_once '../core/config.php';
require 'PHPMailer-master/PHPMailerAutoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer;

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'chmsustudentsviolation@gmail.com'; // Replace with your email
    $mail->Password = '00528898';            // Replace with your email password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender Info
    $mail->setFrom('chmsustudentsviolation@gmail.com', 'Laptronix');
    $mail->addReplyTo('chmsustudentsviolation@gmail.com', 'Laptronix');

    // Recipient
    $mail->addAddress('jacildokaye@gmail.com'); // Replace with the recipient's email

    // Email Content
    $mail->isHTML(true); // Set email format to HTML
    $bodyContent = '<h1>Laptronix - Parts and Services</h1>';
    $bodyContent .= '<p>Thank you for shopping with Laptronix.<br><b>Service Order is ready to pull-out</b></p>';
    $bodyContent .= '<p>This is an automatically generated message. PLEASE DO NOT REPLY TO THIS EMAIL. If you have any questions about your transaction, please call us at 034-4762764. Thank you again for your business.</p>';
    $bodyContent .= '<p>Service Order Number: <b>123456</b></p>';

    $mail->Subject = 'Service Order is ready to pull-out';
    $mail->Body    = $bodyContent;

    // Send Email
    if (!$mail->send()) {
        throw new Exception('Mailer Error: ' . $mail->ErrorInfo);
    } else {
        echo 'Message has been sent successfully.';
    }
} catch (Exception $e) {
    // Catch and display errors
    echo 'Message could not be sent. Error: ' . $e->getMessage();
}
