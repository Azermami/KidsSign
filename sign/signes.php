<!DOCTYPE html>
<html lang="fr">

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
        <li><a class="nav-link scrollto" href=".\index.php?section=#about">A Propos</a></li>
          <li><a class="nav-link scrollto" href=".\index.php?section=#services">Services</a></li>
          <li><a class="nav-link scrollto" href=".\index.php?section=#portfolio">Nos Signes</a></li>
          <li><a class="nav-link scrollto" href=".\index.php?section=#team">Nos Interprètes</a></li>
          <li><a class="nav-link scrollto" href=".\index.php?section=#contact">Contact</a></li>
        
          <li><a class="getstarted scrollto" href="parent-login.php" target="_blank">Connexion</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row d-flex align-items-center">
     <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
        <h1>Faire apprendre la langue des signes à nos enfants sourds</h1>
        <h2>kidSign est une plateforme gratuite pour aider les parents à faire apprendre la langue des signes à leurs enfants sourds ou mal-entendants </h2>

      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="">
      </div>
    </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">
      <div id="projects" class="filter">
        <div class="section-title">
          <h2 data-aos="fade-in">Nos Signes</h2>
          <p data-aos="fade-in">Vous pouvez découvrir nos signes ici par catégorie</p>
        </div>





     <!-- Filter -->
     <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
            <!----<li data-filter="*" class="filter-active">All</li>-->
            <li onclick="location.href='signes.php?tag=jours'">Jours</li>
              <li onclick="location.href='signes.php?tag=Mois'">Mois</li>
              <li onclick="location.href='signes.php?tag=Saisons'"> Saisons</li>
			       <li onclick="location.href='signes.php?tag=Expressions du Temps'">Expressions du Temps</li>
              <li onclick="location.href='signes.php?tag=Nature'">Nature</li>
              <li onclick="location.href='signes.php?tag=Metiers'">Métiers</li>
              <li onclick="location.href='signes.php?tag=Famille'">Famille</li>
              <li onclick="location.href='signes.php?tag=Maison'">Maison</li>
              <li onclick="location.href='signes.php?tag=Couleurs'">Couleurs</li>
              <li onclick="location.href='signes.php?tag=Habillement'">Habillement</li>
              <li onclick="location.href='signes.php?tag=Animaux'">Animaux</li>
              <li onclick="location.href='signes.php?tag=Religion'">Religion</li>
              <li onclick="location.href='signes.php?tag=Nombre'">Nombre</li>
              <li onclick="location.href='signes.php?tag=Phrases quotidiennes'">Phrases quotidiennes</li>

            </ul>
          </div>
        </div>



        <!---------------------------------------------------->

		  <!----------------------------------------------------->


         
          <!----------------------------------------------------------->


          <?php

// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Mois') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Mois'";
    $result = $conn->query($sql);
    $nb=0;
    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) 
          {
            if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];

            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
        }
       


    } else {
        echo "No signes found for the tag 'Mois'.";
    }
} else {
    echo "";
}

// Step 4: Close the database connection
$conn->close();
?>











<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'jours') 
{
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'jours'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>


<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Saisons') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Saisons'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>








<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Expressions du Temps') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Expressions du Temps'";
    $result = $conn->query($sql);

     // Step 3: Generate the HTML code to display the signes
     if ($result->num_rows > 0) 
     {
         $nb=0;
         while ($row = $result->fetch_assoc()) 
         {
           if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];
 
            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
         }
       
     } 
     else { echo "No signes found for the tag 'jours'."; }
 } 
 else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>







<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Nature') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Nature'";
    $result = $conn->query($sql);

     // Step 3: Generate the HTML code to display the signes
     if ($result->num_rows > 0) 
     {
         $nb=0;
         while ($row = $result->fetch_assoc()) 
         {
           if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];
 
            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
         }
       
     } 
     else { echo "No signes found for the tag 'jours'."; }
 } 
 else {echo "";}
// Step 4: Close the database connection
$conn->close();
?>


<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Metiers') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Metiers'";
    $result = $conn->query($sql);

     // Step 3: Generate the HTML code to display the signes
     if ($result->num_rows > 0) 
     {
         $nb=0;
         while ($row = $result->fetch_assoc()) 
         {
           if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];
 
            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
         }
       
     } 
     else { echo "No signes found for the tag 'jours'."; }
 } 
 else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>


<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Famille') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Famille'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>


<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Habillement') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Habillement'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>



<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Animaux') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Animaux'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>


<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Nombre') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Nombre'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>



<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Phrases quotidiennes') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Phrases quotidiennes'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>



<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Couleurs') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Couleurs'";
    $result = $conn->query($sql);

     // Step 3: Generate the HTML code to display the signes
     if ($result->num_rows > 0) 
     {
         $nb=0;
         while ($row = $result->fetch_assoc()) 
         {
           if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];
 
            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
         }
       
     } 
     else { echo "No signes found for the tag 'jours'."; }
 } 
 else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>



<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Maison') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Maison'";
    $result = $conn->query($sql);

     // Step 3: Generate the HTML code to display the signes
     if ($result->num_rows > 0) 
     {
         $nb=0;
         while ($row = $result->fetch_assoc()) 
         {
           if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
           $id_signe = $row["id_signe"];
            $mot_ar = $row["mot_ar"];
            $mot_fr = $row["mot_fr"];
            $image = $row["image"];
            $video = $row["video"];
            $tag = $row["tag"];
            $id_interpret = $row["id_interpret"];
 
            echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
            echo '<div class="portfolio-wrap">';
            echo '<img src="' . $image . '" class="img-fluid" alt="">';
            echo '<div class="portfolio-links">';
            echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
            echo '</div>';
            echo '<div class="portfolio-info">';
            echo '<h4>' . $mot_fr . '</h4>';
            echo '<p>' . $mot_ar . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $nb++;
            if($nb%3==0) { echo '</div>';}  //fin div row
         }
       
     } 
     else { echo "No signes found for the tag 'jours'."; }
 } 
 else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>

<?php
// Step 1: Establish a connection to the MySQL database
include 'db_conn.php';

// Step 2: Retrieve the signes with the "Mois" tag from the "signe" table
if (isset($_GET['tag']) && $_GET['tag'] === 'Religion') {
    $sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE tag = 'Religion'";
    $result = $conn->query($sql);

    // Step 3: Generate the HTML code to display the signes
    if ($result->num_rows > 0) 
    {
        $nb=0;
        while ($row = $result->fetch_assoc()) 
        {
          if($nb%3==0) {  echo '<div class="row portfolio-container"data-aos="fade-up" style="margin-right:auto;margin-left:auto;">'; }
          $id_signe = $row["id_signe"];
           $mot_ar = $row["mot_ar"];
           $mot_fr = $row["mot_fr"];
           $image = $row["image"];
           $video = $row["video"];
           $tag = $row["tag"];
           $id_interpret = $row["id_interpret"];

           echo '<div class="col-lg-4 col-md-6 portfolio-item filter-salutation">';
           echo '<div class="portfolio-wrap">';
           echo '<img src="' . $image . '" class="img-fluid" alt="">';
           echo '<div class="portfolio-links">';
           echo '<a href="affiche-signe.php?id_signe=' . $id_signe . '" title="Voir le signe"><i class="bi bi-link"></i></a>';
           echo '</div>';
           echo '<div class="portfolio-info">';
           echo '<h4>' . $mot_fr . '</h4>';
           echo '<p>' . $mot_ar . '</p>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           $nb++;
           if($nb%3==0) { echo '</div>';}  //fin div row
        }
      
    } 
    else { echo "No signes found for the tag 'jours'."; }
} 
else {echo "";}

// Step 4: Close the database connection
$conn->close();
?>







		  <!------------------------------------------------------>
        </div>

      </div>
    </section><!-- End Portfolio Section -->










    


   <!-- ======= Recherche Section ======= -->
     <!-- ======= Recherche du signe ======= -->
  <section id="recherche">

    <div class="recherche-top">

      <div class="container">

        <div class="row  justify-content-center">
          <div class="col-lg-6">
            <h3>kidSign</h3>
            <p>Saisir le mot souhaité pour afficher le signe correspondant</p>
          </div>
        </div>

        <div class="row recherche-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="text" name="signe" placeholder="Entrer le mot souhaité"><input type="submit" value="Chercher">
            </form>
          </div>
        </div>


      </div>
    </div>


  </section><!-- End -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">




  </footer><!-- End Footer -->

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