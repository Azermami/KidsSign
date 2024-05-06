<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SMTP Configuration
    $smtpHost = 'smtp.gmail.com';
    $smtpUsername = 'lindabouchibane@gmail.com';
    $smtpPassword = 'wjwfzfpthszzfqke';
    $smtpPort = 587;

   
        // Create an instance of PHPMailer
        $mail = new PHPMailer(true);

        // Enable SMTP debugging (optional)
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Uncomment this line for detailed debug output

        // Set SMTP configuration
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtpPort;

        // Set sender and recipient
        $mail->setFrom($_POST['IDemail'], $_POST['nom']);
        $mail->addAddress('lindabouchibane@gmail.com');

        // Set email subject and body
        $mail->Subject = 'Envoi du formulaire de contact';
        $mail->Body = 'Nom: ' . $_POST['nom'] . '<br>Email: ' . $_POST['IDemail'] . '<br>Message: ' . $_POST['message'];
        $mail->isHTML(true);

        // Send the email
        if ($mail->send()) {
            echo 'Email envoyé';
        }
    
}
?>
