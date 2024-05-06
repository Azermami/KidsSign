<?php
include 'db_conn.php';




$id_signe = $_GET['id_signe'];

// Output the id_signe value




  $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE id_signe = '$id_signe;'";
  $result = $conn->query($sql);

  // Step 3: Generate the HTML code to display the signes
  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $id_signe = $row["id_signe"];
      $mot_ar = $row["mot_ar"];
      $mot_fr = $row["mot_fr"];
      $image = $row["image"];
      $video = $row["video"];
      $tag = $row["tag"];
      $id_interpret = $row["id_interpret"];
    }}


// Step 4: Close the database connection<?php  echo   $mot_fr

$sql = "SELECT *  FROM interpret WHERE id_interpret = ' $id_interpret ;'";
$result = $conn->query($sql);

// Step 3: Generate the HTML code to display the signes
if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    $nom = $row["nom"];
    $prenom = $row["prenom"];

  }}


// Step 4: Close the database connection<?php  echo   $mot_fr
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>kidSign</title>
  <meta content="plateforme d'apprentissage de la langue des signes" name="description">
  <meta content="langue des signes" name="keywords">


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">

  <!-- =======================================================

  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">kidSign<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        <!-- <li><a class="nav-link scrollto" href="#about">A Propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Nos Signes</a></li>
          <li><a class="nav-link scrollto" href="#team">Nos Interprètes</a></li> -->
        <!--- <li><a class="nav-link scrollto" href="#contact">Contact</a></li>-->
          <li><a class="getstarted scrollto" href="parent-login.php" target="_blank">Connexion</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Détails du signe  <?php  echo   $mot_fr?></h2>
          <ol>
            <li><a href="index.php">kidSign</a></li>
            <li><a href="signes.php">Signes</a></li>
            <li><?php  echo   $mot_fr?></li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">

		<div class="position-relative align-self-start order-lg-last order-first">
    <?php  echo '<img src="' . $image . '" class="img-fluid" alt="">';?>
    <?php  echo '<a href="' . $video . '" class="glightbox play-btn" alt=""></a>';?>


          </div>


            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php  echo   $mot_fr?> <?php  echo   $mot_ar?></h3>
              <ul>
                <li><strong>Catégorie</strong>: <?php  echo   $tag?></li>
                <li><strong>Mot</strong>: <?php  echo   $mot_fr?></li>
                <li><strong>Interpréter par </strong>: <?php  echo   $nom .' '.$prenom?></li>
              </ul>
            </div>
            <div class="portfolio-description">

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>