<?php

require 'C:\xampp\htdocs\rongai_poultry\vendor\autoload.php'; // Include the Composer autoloader

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'olphemie@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'itak uyjg empc blnp'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email settings
    $mail->setFrom('olphemie@gmail.com', 'Rongai Poultry');
    $mail->addAddress('recipient@example.com');
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = '<b>This is a test email</b>';
    $mail->AltBody = 'This is a test email';

    // Send email
    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email content
    $to = "rongai-poultry@gmail.com";
    $email_subject = "Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n"; // Corrected from "Email" to "Phone"
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";
    $headers = "From: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }
} else {
    // Handle if the script is accessed directly or through another method
    echo "Invalid request";
}
?>
