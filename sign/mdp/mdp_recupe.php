<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'sourd');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the form
$IDemail = $_POST['IDemail'];

// Select data from the DB
$sql = "SELECT * FROM parent WHERE `e-mail` = '$IDemail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the data from the result
    while ($row = mysqli_fetch_assoc($result)) {
        $mot_de_passe = $row['mot_de_passe'];
        $nom = $row['nom'];

        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'lindabouchibane@gmail.com'; // SMTP username
            $mail->Password = 'wjwfzfpthszzfqke'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port =  456;//25; // 465// TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('lindabouchibane@gmail.com', 'Mailer');
            $mail->addAddress($IDemail); // Add a recipient
            $mail->addAddress('lindabouchibane@gmail.com'); // Name is optional
            /*$mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/

            // Attachments
            /*$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/ // Optional name

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Recuperation du login et mot de passe';
            $mail->Body = "Salut " . $nom . ",<br><br>Votre mot de passe est : " . $mot_de_passe;
            $mail->AltBody = '';

            $mail->send();
            echo 'Message envoyé avec succès.';
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else {
    echo "Aucune donnée trouvée pour l'adresse email spécifiée.";
}

// Close the database connection
mysqli_close($conn);
?>
