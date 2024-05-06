<?php
include "db_conn.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'nom' key exists in the $_POST array
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    } else {
        // Handle the case when the 'nom' key is not present
        $nom = '';
    }

    // Check if the 'prenom' key exists in the $_POST array
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        // Handle the case when the 'prenom' key is not present
        $prenom = '';
    }

    // Check if the 'email' key exists in the $_POST array
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        // Handle the case when the 'email' key is not present
        $email = '';
    }

    // Check if the 'telephone' key exists in the $_POST array
    if (isset($_POST['telephone'])) {
        $telephone = $_POST['telephone'];
    } else {
        // Handle the case when the 'telephone' key is not present
        $telephone = '';
    }

    // Prepare the SQL query
    $query = "INSERT INTO parent (nom, prenom, email, telephone) VALUES ('$nom', '$prenom', '$email', '$telephone')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record inserted successfully.');</script>";
        header("Location: parent-login.php");
    } else {
        echo "<script>alert('Error: " . $query . "\\n" . mysqli_error($conn) . "');</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!-- Your HTML form here -->


<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>S'inscrire</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

 <!---- code js radio button
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $("#options").change(function(){
    var option = $("#options").val();
    if (option == "2") {
      $("#interpret-register").show();
    } else if (option == "parent") {
      $("#parent-register").show();
    }
  });
});
</script>
-->


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/favicon.png" alt="">






        <div class="Section"><h1><a href="index.php">kidSign<span>.</span></a></h1> </a>


      </div>
    </div>



                </a>





              <!--  </div> End Logo -->

              <div class="widercard">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="login">Inscription </h5>
                    <p class="text-center small">Saisie d'informations personnelles</p>
                  </div>
                  <div class="d-flex justify-content-center py-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Parent &nbsp;&nbsp;
                      </label>
                    </div>
                   
                    </div>




                            <form class="row g-3 needs-validation" method="POST" action="inscri-parent.php" novalidate>
                                <div class="col-12">
                                    <label for="validationTooltip01" class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="validationTooltip01" required>
                                    <div class="valid-tooltip"></div>
                                </div>

                                <div class="col-12">
                                    <label for="validationTooltip01" class="form-label">Prenom</label>
                                    <input type="text" name="prenom" class="form-control" id="validationTooltip01" required>
                                    <div class="valid-tooltip"></div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Votre Email</label>
                                    <input type="email" name="IDemail" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Veuillez entrer une adresse mail valide!</div>
                                </div>

                                <div class="col-12">
                                    <label for="telephone">Numéro de téléphone:</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control" pattern="[0-9]{8}" required>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Créer</button>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Vous avez déjà un compte ? <a href="parent-login.php">se connecter</a></p>
                                </div>
                            </form>






                </div>
              </div>

             <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

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
   <!-- redirect to interpret sign up page-->
<script>
  function redirect() {
    window.location.href = "interpret-register.html";
  }
  </script>


</body>

</html>