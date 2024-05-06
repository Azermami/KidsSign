
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

  <title>Liste des nouveaux mots</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

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

  <style>
		.popup {
      width: 55%;
      height: 70%;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			border: 2px solid #ccc;
			box-shadow: 0 2px 4px rgba(0,0,0,.3);
			display: none;

		}

    .close {
      position: absolute;
      top: 1%;
      left: 93%;

      width: 5%;
      height: 5%;


}




	</style>
</head>
<body>




  

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">




<div class="d-flex align-items-center justify-content-between">

<a href="Interpret_Liste_des_nouveaux_mots.php" class="logo d-flex align-items-center">

<img src="assets/img/logo.png" alt="">

<span class="d-none d-lg-block">kidSign.</span>

</a>

<i class="bi bi-list toggle-sidebar-btn"></i>

</div><!-- End Logo -->




<nav class="header-nav ms-auto">

<ul class="d-flex align-items-center">




<!-- End Search Icon-->




<!-- Connexion à la base de données -->
<?php
$conn = mysqli_connect('localhost', 'root', '', 'sourd');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer le nombre de demandes non traitées
$sql_count = "SELECT COUNT(*) AS count_demandes
              FROM demande d
              LEFT JOIN affectation a ON d.id_demande = a.id_demande
              WHERE a.id_interpret=a.id_interpret AND d.statut = 'en cours' and a.video_recu = ''";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$count = $row_count["count_demandes"];
?>

<!-- Affichage du badge de notification -->
<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" onclick="resetNotificationCount()">
    <i class="bi bi-bell"></i>
    <span class="badge bg-primary badge-number"><?php echo $count; ?></span>
</a>

<!-- Menu déroulant des notifications -->
<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="max-height: 500px; overflow-y: auto;">
    <li class="dropdown-header">
        Tu as reçu <?php echo $count; ?> nouvelle notification
    </li>

    <?php
    // Récupérer les demandes non traitées
    $sql_notifications = "SELECT d.id_demande, d.mot, d.date_ajout
                          FROM demande d
                          LEFT JOIN affectation a ON d.id_demande = a.id_demande
                          WHERE a.id_interpret=a.id_interpret AND d.statut = 'en cours' and a.video_recu = ''";
    $result_notifications = $conn->query($sql_notifications);

    if ($result_notifications->num_rows > 0) {
        while ($row = $result_notifications->fetch_assoc()) {
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
    } else {
        echo "<hr class='dropdown-divider'>";
        echo "<p><center> Aucune demande non traitée. </center></p>";
    }

    // Pas de réinitialisation du compteur ici, car cela peut causer des problèmes
    ?>

</ul>

<!-- Script pour réinitialiser le compteur -->
<script>
    function resetNotificationCount() {
        var badge = document.querySelector('.badge-number');
        if (badge) {
            badge.textContent = 0;
        }
    }
</script>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
<!-- End Messages Nav -->

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
              <a class="dropdown-item d-flex align-items-center" href="Interprete_profil.php">
                <i class="bi bi-person"></i>
                <span>Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Interprete_Assistance.php">
                <i class="bi bi-gear"></i>
                <span>Assistance</span>
              </a>
            </li><li>
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
          <a class="nav-link collapsed" href="Interpret_Liste_des_nouveaux_mots.php">
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
      <h1>Liste des nouveaux mots</h1>

    </div><!-- End Page Title -->

  <?php
include "db_conn.php";

if ($conn) {
  $requete = "SELECT a.id_demande, a.date_affectation, a.video_recu, d.mot, d.date_ajout
            FROM affectation AS a
            INNER JOIN demande AS d ON d.id_demande = a.id_demande
            WHERE a.etat = 'sent' AND a.id_interpret = ".$_SESSION['id_interpret'];


  $resultat = $conn->query($requete);

  if (!$resultat) {
    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
  }
}
?>

<div class="container-scroller">
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Table des nouveaux mots</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Mot</th>
                                    <th>Date Ajout</th>
                                    <th>Date Affectation</th>
                                    <th>Video</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($resultat)) {?>
                                    <tr>
                                        <td><?php echo $row["id_demande"];?></td>
                                        <td><?php echo $row["mot"];?></td>
                                        <td><?php echo $row["date_ajout"];?></td>
                                        <td><?php echo $row["date_affectation"];?></td>
                                        <td><?php echo $row["video_recu"];?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_demande'];?>">Interpréter</button>
                                            <div class="modal fade" id="exampleModal<?php echo $row['id_demande'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Choisir une vidéo</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                                                <input type="file" name="my_video"><br>
                                                                <input type="hidden" name="id" value="<?php echo $row['id_demande'];?>"><br>
                                                                <input type="submit" name="submit" class="btn btn-success" value="Ajouter">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





          <div class="col">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">Statistiques</h5>

                <!-- Doughnut Chart -->
             <?php   
			 include 'piechart.php';
			 ?>
                <!-- End Doughnut CHart -->

              </div>
            </div>




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

<?php


if(isset($_POST['submit'])) {
    $id = $_POST['id_demande'];

    // Traitement de la vidéo
    $target_dir = "videos/";
    $target_file = $target_dir . basename($_FILES["my_video"]["name"]);
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("mp4","avi","mov","mpeg");
    
    if(in_array($videoFileType,$extensions_arr)){
        if(move_uploaded_file($_FILES["my_video"]["tmp_name"], $target_file)){
           // Enregistrement des données dans la base de données
           $query = "UPDATE mots SET video = '$target_file' WHERE id = '$id'";
           mysqli_query($conn,$query);
            
           echo "Le fichier ". basename( $_FILES["my_video"]["name"]). " a été téléchargé avec succès.";
        }
    }
}
?>
