<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//include "db_conn.php";
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'sourd');


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

require 'vendor/autoload.php'; // Path to PHPMailer autoload file

// Function to generate a random login

function Generatelogin($nom) {
    $username = '';
    $username = substr(str_shuffle($nom), 0, 3) . rand(100, 999);
    return $username;

    
    
}

//generate password
function generatePassword($length = 8) {
    // Define the character set for the password
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    $password = '';
    
    // Generate a random password by selecting characters randomly from the character set
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }
    
    return $password;
}






// Retrieve data from the form
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$IDemail = $_POST['IDemail'];
$telephone = $_POST['telephone'];





    
       // generate user name
       $randomUsername = Generatelogin($nom);
       // generate password 
       $password = generatePassword(10);

    // Prepare the SQL query 
    $query = "INSERT INTO parent (nom, prenom, email, telephone, username, mot_de_passe) VALUES ('$nom', '$prenom', '$IDemail', '$telephone', '$randomUsername','$password')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        ///it starts
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
            $mail->Port =  465;//25; TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('lindabouchibane@gmail.com', 'Mailer');
            $mail->addAddress($IDemail); // Add a recipient
            $mail->addAddress('lindabouchibane@gmail.com'); // Name is optional
            
           /* $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/

            // Attachments
            /*$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/ // Optional name

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'informations d"identification';
            $mail->Body = "Salut " . $nom . ",<br><br> Merci pour votre inscription, <br> voici vos informations de connexion <br> Votre nom d'utlisateur : ". $randomUsername ." <br> Votre mot de passe est : " . $password;
            $mail->AltBody = '';

            $mail->send();
            echo "<script>alert('Inscription réussie. Vous recevez un courriel contenant votre mot de passe.');</script>";
           // echo 'Message envoyé avec succès.';
            header("Location:confirm_register.php  ");
            
        } 
        catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        }       
    }
     else {
        echo "<script>alert('Error: " . $query . "\\n" . mysqli_error($conn) . "')</script>";
    }
  
    // Close the database connection
    mysqli_close($conn);

?>