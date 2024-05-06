<?php
session_start();
if (!isset($_SESSION['nom']) && !isset($_SESSION['prenom'])) 
{
    exit; 
	header('location: interpret-login.php');
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil</title>
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
      <h1>Profil</h1>
     
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <?php
              include "db_conn.php";        
              $id_interpret = $_SESSION['id_interpret'];
              $sql = "SELECT photo FROM interpret WHERE id_interpret = $id_interpret";
              $res = mysqli_query($conn, $sql);

          if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          $photo = $row['photo'];
          if (!empty($photo)) {
            echo '<img width="120px" height="120px" src="espace_interpret/uploads/' . $photo . '" alt="Profile" class="rounded-circle">';
          } else {
            echo '<img width="120px" height="120px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
          }
        }

        mysqli_close($conn);
        ?>
              <h2><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h2>
              <h3>Interpréte</h3>
             
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Aperçu</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le profil</button>
                </li>

               

               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Détails du profil</h5>

                  <?php
    include "db_conn.php";

    // Récupérer les informations de l'utilisateur à partir de la base de données
    $id_interpret = $_SESSION['id_interpret'];
    $query = "SELECT * FROM interpret WHERE id_interpret = $id_interpret"; 
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Nom et prénom</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["nom"] . " " . $row["prenom"]; ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Pays</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["pays"]; ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Association</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["association"]; ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Photo</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["photo"]; ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Téléphone</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["telephone"]; ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">E-mail</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["email"]; ?></div>
</div>
<?php
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
?>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="upload1.php" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image de profil</label>
    <div class="col-md-8 col-lg-9">
      <?php
        include "db_conn.php";        
        $id_interpret = $_SESSION['id_interpret'];
        $sql = "SELECT photo FROM interpret WHERE id_interpret = $id_interpret";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          $photo = $row['photo'];
          if (!empty($photo)) {
            echo '<img width="120px" height="120px" src="espace_interpret/uploads/' . $photo . '" alt="Profile" class="rounded-circle">';
          } else {
            echo '<img width="120px" height="120px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
          }
        } else {
          echo '<img width="120px" height="120px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
        }

        mysqli_close($conn);
        ?>
      <div class="pt-2">
        <input type="file" name="my_image" id="profileImage" style="display: none;">
        <label for="profileImage" class="btn btn-danger" title="Upload new profile image">
          <i class="bi bi-upload"></i>
        </label>
        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
      </div>
    </div>
  </div>
</form>
                   <!-- fin edit form photo -->


                   <form method="post" action="modifier_interpret.php">
  <div class="row mb-3">
    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
    <div class="col-md-8 col-lg-9">
      <input type="text" name="nom" value="<?php echo isset($row["nom"]) ? $row["nom"] : ''; ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
    <div class="col-md-8 col-lg-9">
      <input type="text" name="prenom" value="<?php echo isset($row["prenom"]) ? $row["prenom"] : ''; ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
    <div class="col-md-8 col-lg-9">
      <input type="email" name="email" value="<?php echo isset($row["email"]) ? $row["email"] : ''; ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
    <div class="col-md-8 col-lg-9">
      <input type="tel" name="telephone" value="<?php echo isset($row["telephone"]) ? $row["telephone"] : ''; ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="pays" class="col-md-4 col-lg-3 col-form-label">Pays</label>
    <div class="col-md-8 col-lg-9">
      <input type="text" name="pays" value="<?php echo isset($row["pays"]) ? $row["pays"] : ''; ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="association" class="col-md-4 col-lg-3 col-form-label">Association</label>
    <div class="col-md-8 col-lg-9">
      <input type="text" name="association" value="<?php echo isset($row["association"]) ? $row["association"] : ''; ?>" required>
    </div>
  </div>
<div class="text-center">
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</div>
</form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

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