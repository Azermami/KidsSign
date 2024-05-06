<?php
session_start();

if (!isset($_SESSION['nom']) && !isset($_SESSION['prenom'])) {
    exit; // Ajout de l'instruction exit pour arrêter l'exécution du script après la redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Assistance</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/a.png" rel="icon">
  <link href="assets/img/a.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">




<div class="d-flex align-items-center justify-content-between">

<a href="Interprete_liste_des_signes_confirmés.php" class="logo d-flex align-items-center">

<img src="assets/img/logo.png" alt="">

<span class="d-none d-lg-block">kidSign.</span>

</a>

<i class="bi bi-list toggle-sidebar-btn"></i>

</div><!-- End Logo -->




<nav class="header-nav ms-auto">

<ul class="d-flex align-items-center">




<!-- End Search Icon-->




<li class="nav-item dropdown">
<?php

$conn = mysqli_connect('localhost', 'root', '', 'sourd');





if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}



// Fetch the count of `id_reclamation` from the `reclamation` table

 $sql = "SELECT COUNT(*) AS count_demandes
 FROM demande d
 LEFT JOIN affectation a ON d.id_demande = a.id_demande
 WHERE a.id_interpret IS NULL AND d.statut = 'en cours'";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $count = $row["count_demandes"];

?>




<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" onclick="resetNotificationCount()">

<i class="bi bi-bell"></i>

<span class="badge bg-primary badge-number"><?php echo $count; ?></span>

</a>

<!-- End Notification Icon -->




<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications " style="max-height: 500px; overflow-y: auto;">

<li class="dropdown-header">

Tu as Récu <?php echo $count; ?> une nouvelle notification

</li>

<li>

<hr class="dropdown-divider">




<?php

$conn = mysqli_connect('localhost', 'root', '', 'sourd');




// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

 $sql = "SELECT d.id_demande, d.mot, d.date_ajout, a.id_interpret
 FROM demande d
 LEFT JOIN affectation a ON d.id_demande = a.id_demande
 WHERE a.id_interpret IS NULL AND d.statut = 'en cours'";
 $result = $conn->query($sql);



// Si des demandes non traitées sont trouvées

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
     $idDemande = $row["id_demande"];
     $mot = $row["mot"];
     $dateAjout = $row["date_ajout"];
     ?>

<li class="notification-item">

<i class="bi bi-exclamation-circle text-warning"></i>

<div>

<h4>Nouvelle Demande</h4>

<p>Une nouvelle Demande a été ajoutée le <?php echo $dateAjout; ?></p>

<p>Mot : <?php echo $mot; ?></p>

</div>

</li>

<?php

}

// Reset notification count to 0 after displaying notifications

$resetQuery = "UPDATE reclamation SET `id_reclamation` = `id_reclamation`";

mysqli_query($conn, $resetQuery);

} else {

echo " <hr class='dropdown-divider'>";

echo "<p><center> Aucune Reclamation. </center></p>";

}

$conn->close();

?>




</li>

</ul>

<script>

function resetNotificationCount() {

var badge = document.querySelector('.badge-number');

if (badge) {

badge.textContent = 0;

}

}

</script><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           <?php
         include "db_conn.php";        
         $id_interpret = $_SESSION['id_interpret'];
         $sql = "SELECT photo FROM interpret WHERE id_interpret = $id_interpret";
         $res = mysqli_query($conn, $sql);

         if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          $photo = $row['photo'];
		  
          if (!empty($photo)) {
            echo '<img width="50px" height="50px" alt="Profile" src="espace_interpret/uploads/' . $photo . '" class="rounded-circle">';
          } else {
            echo '<img width="50px" height="50px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
          }
        }

        mysqli_close($conn);
        ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Bienvenue, " . $_SESSION['nom']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h6>
              <span>Interpret</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Assistance</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../interpret-login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Se déconnecter</span>
              </a>
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="Interpret_liste_des_nouveaux_mots.php">
            <i class="i bi-card-list"></i>
            <span>Liste de nouveaux mots</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="Interprete_Liste_des_signes_interpreter.php">
            <i class="bi bi-list-columns-reverse"></i>
            <span>Liste des signes interpretés</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="Interprete_liste_des_signes_confirmés.php">
            <i class="bi bi-list-check"></i>
            <span>Liste des signes confirmés</span>
          </a>
        </li><!-- End Dashboard Nav -->

          </ul>
        </li><!-- End Components Nav -->

      
        <li class="nav-item">
          <a class="nav-link collapsed " href="Interprete_profil.php">
            <i class="bi bi-person-square"></i>
            <span>Profil</span>
          </a>
        </li><!-- End Profile Page Nav -->
      


        <li class="nav-item">
          <a class="nav-link collapsed" href="Interprete_Assistance.php">
            <i class="bi bi-question-square"></i>
            <span>Assistance</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->


      

     

      
     


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Assistance</h1>
      
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-6">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Questions pertinentes
              </h5>

              <div>
                <h6>
                  1-Quels sont les signes interprétés ?
                  </h6>
                <p>Les signes interprétés sont des signes pour lesquels vous avez envoyé la séquence vidéo mais qui ne sont pas encore confirmés. En d'autres termes, vous pouvez les visualiser et les refaire si vous avez détecté un problème dans la vidéo correspondante.
                  Si vous êtes satisfait de la qualité de la vidéo et de son contenu, vous devez confirmer la soumission du signe à l'administrateur du site.
                  </p>
              </div>

              <div class="pt-2">
                <h6>2-Quels sont les signes confirmés?</h6>
                <p>Les signes confirmés sont des signes qui indiquent que vous êtes satisfait de la qualité de la séquence vidéo et que vous l'avez finalement soumise à l'administrateur. Dès qu'ils sont soumis à l'administrateur, vous ne pouvez plus les supprimer ou les modifier. Vous ne pouvez que les visualiser.
                </p>
              </div>

             

            </div>
          </div>

          <!-- F.A.Q Group 1 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des signes interprétés</h5>

              <div class="accordion accordion-flush" id="faq-group-1">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                      Pouquoi visualiser la vidéo chargée? 
                    </button>
                  </h2>
                  <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Pour être sûr de la qualité et le contenu de la séquence vidéo chargée, vous pouvez cliquer sur le bouton "Visualiser"</div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                      Pourquoi refaire une vidéo?
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Si vous avez détecté un problème dans la séquence vidéo chargée, vous pouvez refaire le processus de chargement une autre fois.</div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      Pourquoi confirmer l'interprétation d'un signe?
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      La confirmation de l'interprétation est une étape importante. En cliquant sur le bouton "Confirmer", vous confirmez définitivement le contenu de la séquence vidéo chargée. Vous ne pourrez plus le changer ou le modifier par la suite.
                    </div>
                  </div>
                </div>

               

                

              </div>

            </div>
          </div><!-- End F.A.Q Group 1 -->

        </div>

        <div class="col-lg-6">

          <!-- F.A.Q Group 2 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des nouveaux mots</h5>

              <div class="accordion accordion-flush" id="faq-group-2">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                      Comment interpréter un nouveau mot?
                    </button>
                  </h2>
                  <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      La liste des nouveaux mots représente quelques termes proposés par les parents qu'il vous est demandé une interprétation en Langue des Signes Tunisienne.
                      Il vous suffit de cliquer sur le bouton "Interpréter" pour lancer l'opération de chargement.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                      Comment ajouter la vidéo désirée?
                    </button>
                  </h2>
                  <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Lorsque vous avez choisi d'interpréter un mot, vous devez cliquer sur le bouton "Interpréter" pour lancer le processus de téléchargement. Une fenêtre apparaîtra sur la droite pour choisir la vidéo que vous souhaitez. Une fois la vidéo choisie, vous devez cliquer sur le bouton "Ajouter à la liste des signes interprétés" pour finaliser l'opération. </div>
                  </div>
                </div>

                

                

                

              </div>

            </div>
          </div><!-- End F.A.Q Group 2 -->

          <!-- F.A.Q Group 3 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des signes confirmés</h5>

              <div class="accordion accordion-flush" id="faq-group-3">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                      Comment visualiser l'interprétation d'un signe déjà confirmé?
                    </button>
                  </h2>
                  <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Cette liste vous présente tous les signes dont vous avez définitivement confirmé le contenu et qui seront publiés sur le site kidSign. Vous ne pouvez plus les supprimer. Vous pouvez seulement les visualiser.</div>
                  </div>
                </div>

                

                

                

                

              </div>

            </div>
          </div><!-- End F.A.Q Group 3 -->

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

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

</body>

</html>