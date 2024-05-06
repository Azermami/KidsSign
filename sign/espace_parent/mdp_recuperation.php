<?php
// Function to retrieve the password from the database
function getPassword($email) {
    include "db_conn.php";

    $stmt = $conn->prepare('SELECT password FROM parent WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $conn->close();

    if ($result) {
        return $result['password'];
    } else {
        return null;
    }
}

// Function to send an email with the password
function sendEmail($nom, $email, $pwd) {
    $to = $email;
    $subject = 'Password Retrieval';
    $message = "Salut $nom,\n\nVotre mot de passe est : $pwd";
    $headers = "From: hamzamrayhi@yahoo.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Courriel envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du courrier électronique.";
    }
}

// Main program
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];

    // Retrieve the password from the database
    $pwd = getPassword($email);

    if ($pwd) {
        // Send the email
        sendEmail($login, $email, $pwd);
    } else {
        echo "Nom d'utilisateur non trouvé.";
    }
    exit; // Stop further execution after handling the form submission
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login to kidSign </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- nice admin style sheet <link href="assets/css/style2.css" rel="stylesheet">-->
  <link href="assets/css/style_bienvenue.css" rel="stylesheet">


</head>

<body>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/favicon.png" alt="">
                  
                  
 
   

      
        <div class="Section"><h1><a href="index.html">kidSign<span>.</span></a></h1> </a>
      
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>
    </div>
  
    
    
                </a>
             
        
              <div class="widercard">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="mdp">Réinitialiser votre mot de passe</h5>
                    <p class="text-center small">Nous vous enverrons un courriel contenant des instructions sur la façon de le récupérer.</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate id="forms-validation">
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"></span>
                      <input type="text" name="username" class="form-control" placeholder="Introduire votre adresse mail" id="yourUsername" required>
                      <div class="invalid-feedback">Veuillez entrer votre adresse mail.</div>
                    </div>
                  </div>
                 

                    
                  
                  <div class="col-12 pt-4">
                    <button class="btn btn-primary w-100" type="submit">Envoyer</button>
                  </div>
                   
                  </form>

                </div>
              </div>

             
                

            </form>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="index.html" target="_blank">kidSign</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/main2.js"></script>
  <!-- fill in red sign -->
  <script>
    (function() {
      'use strict';
      var forms = document.querySelectorAll('.needs-validation');
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
    })();
  </script>
  <!-- end fill in red sign -->

</body>

</html>