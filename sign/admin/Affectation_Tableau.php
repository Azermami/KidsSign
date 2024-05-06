<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TIFLY SIGN</title>
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


</head>

<body>

  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">




 <div class="d-flex align-items-center justify-content-between">

 <a href="index.php" class="logo d-flex align-items-center">

 <img src="assets/img/logo.png" alt="">

 <span class="d-none d-lg-block">TIFLY SIGN</span>

 </a>

 <i class="bi bi-list toggle-sidebar-btn"></i>

 </div><!-- End Logo -->




 <nav class="header-nav ms-auto">

 <ul class="d-flex align-items-center">




 
<!-- Réclamations -->
<li class="nav-item dropdown">
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'sourd');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT COUNT(`id_reclamation`) AS count FROM reclamation";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    ?>

    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" onclick="resetNotificationCount()">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number"><?php echo $count; ?></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications " style="max-height: 500px; overflow-y: auto;">
        <li class="dropdown-header">
            Tu as reçu <?php echo $count; ?> une Nouvelle Réclamation
        </li>

        <?php
        $sql = "SELECT * FROM reclamation ORDER BY date_reclamation DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idDemande = $row["id_reclamation"];
                $mot = $row["titre"];
                $dateAjout = $row["date_reclamation"];
                ?>
                <li class="notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                        <h4>Nouvelle Reclamation</h4>
                        <p>Une nouvelle Reclamation a été ajoutée le <?php echo $dateAjout; ?></p>
                        <p>Titre : <?php echo $mot; ?></p>
                    </div>
                </li>
                <?php
            }

            // Reset notification count to 0 after displaying notifications
            $resetQuery = "UPDATE reclamation SET `id_reclamation` = `id_reclamation`";
            mysqli_query($conn, $resetQuery);
        } else {
            echo "<hr class='dropdown-divider'>";
            echo "<p><center> Aucune Reclamation. </center></p>";
        }

        $conn->close();
        ?>
    </ul>
    <script>
        function resetNotificationCount() {
            var badge = document.querySelector('.badge-number');
            if (badge) {
                badge.textContent = 0;
            }
        }
    </script>
</li>

<!-- Demandes de parent -->
<li>
    <hr class="dropdown-divider">
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'sourd');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query_parent_requests = "SELECT COUNT(`id_demande`) AS count FROM demande WHERE statut = 'Nouveau'";
    $result_parent_requests = mysqli_query($con, $query_parent_requests);
    $row_parent_requests = mysqli_fetch_assoc($result_parent_requests);
    $count_parent_requests = $row_parent_requests['count'];
    ?>

    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" onclick="resetNotificationCount()">
        <i class="bi bi-person"></i>
        <span class="badge bg-primary badge-number"><?php echo $count_parent_requests; ?></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="max-height: 500px; overflow-y: auto;">
        <?php
        $sql_parent_requests = "SELECT id_demande, mot, date_ajout FROM demande WHERE statut = 'Nouveau' ORDER BY date_ajout DESC";
        $result_parent_requests = mysqli_query($con, $sql_parent_requests);

        if (mysqli_num_rows($result_parent_requests) > 0) {
            while ($row_parent_requests = mysqli_fetch_assoc($result_parent_requests)) {
                $id_demande_parent = $row_parent_requests["id_demande"];
                $mot_parent = $row_parent_requests["mot"];
                $date_ajout_parent = $row_parent_requests["date_ajout"];
                ?>
                <li class="notification-item">
                    <i class="bi bi-person text-success"></i>
                    <div>
                        <h4>Nouvelle demande de parent</h4>
                        <p>Une nouvelle demande de parent a été ajoutée le <?php echo $date_ajout_parent; ?></p>
                        <p>Mot : <?php echo $mot_parent; ?></p>
                    </div>
                </li>
                <?php
            }
        } else {
            echo "<p><center> Aucune demande de parent. </center></p>";
        }
        ?>
    </ul>
</li>







		<!-- fin du test notif --><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/admin.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Azer MAMI</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



            <li>
              <a class="dropdown-item d-flex align-items-center" href="../admin-login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Se déconnecter</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Demandes des parents</span>
      </a>
    </li><!-- End Dashboard Nav -->



    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Affectations </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse  show  " data-bs-parent="#sidebar-nav">

        <li>
          <a href="Affectation_Tableau.php" class="active">
            <i class="bi bi-circle"></i><span>Liste des Affectations </span>
          </a>
        </li>
        <li>
          <a href="Affectation_recu.php">
            <i class="bi bi-circle"></i><span>Validation des Affectations</span>
          </a>
        </li>

      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Signes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

        <li>
          <a href="Ajout_sign.php">
            <i class="bi bi-circle"></i><span>Ajout d'un signe</span>
          </a>
        </li>
        <li>
          <a href="Liste_des_signes.php">
            <i class="bi bi-circle"></i><span>Liste des signes</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-user-settings-fill"></i><span>Comptes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="Comptes.php">
            <i class="bi bi-circle"></i><span>Liste Des Comptes</span>
          </a>
        </li>
        <li>
          <a href="creation_compte_inter.php">
            <i class="bi bi-circle"></i><span>Creation des Comptes </span>
          </a>
        </li>

      </ul>
    </li><!-- End Charts Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed"  href="Statistiques.php">
          <i class="bx bx-bar-chart"></i><span>Statistiques</span>
        </a>

      </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste des Affectations </h1>

    </div><!-- End Page Title -->
    <div class="col-12">
      <div class="card recent-sales overflow-auto">



        <div class="card-body">
          <h5 class="card-title">Liste des affectations envoyées </h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">ID. Demande</th>
                <th scope="col">ID. interprete</th>
                <th scope="col">Video recu</th>
                <th scope="col">Date Affectation</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php include 'assets/php/Liste_des_Affectations_envo.php'; ?>
            </tbody>
          </table>

        </div>

      </div>
    </div><!-- End Recent Sales -->
    <!--tab 2-->
    <div class="col-12">
      <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Liste des affectations reçues  </h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
               <th scope="col">ID. Demande</th>
                <th scope="col">ID. interprete</th>
                <th scope="col">Video recu</th>
                <th scope="col">Date Affectation</th>
                <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php include 'assets/php/Liste_des_Affectations_recu.php'; ?>


        </tbody>
      </table>

    </div>

  </div>
</div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="credits">

    </div>
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