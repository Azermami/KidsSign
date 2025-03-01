<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portail Parent</title>
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
 <!-- ======= Header ======= -->


<header id="header">

    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><img src="assets/img/favicon.png" alt="">kidSign<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php?section=#about">A Propos</a></li>
          <li><a class="nav-link scrollto" href="index.php?section=#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php?section=#portfolio">Nos Signes</a></li>
          <li><a class="nav-link scrollto" href="index.php?section=#team">Nos Interprètes</a></li>
          <li><a class="nav-link scrollto" href="index.php?section=#contact">Contact</a></li>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto"></a>
              </div>







            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="login"> Bienvenue!</h5>
                    <p class="text-center small">Entrez votre nom d’utilisateur et votre mot de passe pour vous connecter</p>
                  </div>
                           <!-- <select id="options">
                                <option value="">Choisir</option>
                                <option value="1">Parent</option>
                                <option value="2">Interpréteur</option>
                              </select>-->

                              <div class="d-flex justify-content-center py-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Parent &nbsp;&nbsp;
                                </label>
                              </div>


                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="redirect()">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Interpréteur &nbsp;&nbsp;
                                </label>
                              </div>

                              <!-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="redirectAdmin()">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Admin
                                </label>
                              </div> -->

                              </div>

                  <form class="row g-3 needs-validation" novalidate id="forms-validation" method="post" action="login-par.php">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" id="yourUsername" required>
                        <div class="invalid-feedback">Veuillez entrer votre nom d’utilisateur.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="pwd"  placeholder="mot de passe" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Veuillez entrer votre mot de passe!</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se rappeler de moi</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                     <button class="btn btn-warning w-100" type="submit">Se connecter</button>

                      <!--btn btn-primary w-100-->
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a href="mdp-oubliee.php">Oublié votre mot de passe?</a></p>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous n’avez pas de compte? <a href="parent-register.php">Créez
                         un compte</a></p>
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
    window.location.href = "interpret-login.php";
  }

  function redirectAdmin() {
    window.location.href = "admin-login.php";
  }
  </script>



</body>

</html>