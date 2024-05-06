<?php
include "db_conn.php";
session_start();

if(isset($_SESSION['id_parent']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
  $id_parent = $_SESSION['id_parent'];
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion des demandes</title>
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
      <a href="" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">kidSign.</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

         

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php
                            include "db_conn.php";
                            $id_parent = $_SESSION['id_parent'];
                            $sql = "SELECT image FROM parent WHERE id_parent = $id_parent";
                            $res = mysqli_query($conn, $sql);



                            if (mysqli_num_rows($res) > 0) {
                            $row = mysqli_fetch_assoc($res);
                            $image = $row['image'];

                            if (!empty($image)) {
                            echo '<img width="50px" height="50px" alt="Profile" src="espace_parent/uploads/' . $image . '" class="rounded-circle">';
                            } else {
                            echo '<img width="50px" height="50px" src="assets/img/ano.jpg" alt="Profile" class="rounded-circle">';
                            }
                            }



                            mysqli_close($conn);
 ?>
            <span class="d-none d-md-block dropdown-toggle ps-2">
              
            
            <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?>

          
          
          
          
          </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="parent_profil.php">
                <i class="bi bi-person"></i>
                <span>Profil</span>
              </a>
            </li>
           

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="parent_assistance.php">
                <i class="bi bi-question-circle"></i>
                <span>Assistance</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center"  href="../parent-login.php">
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
          <a class="nav-link collapsed" href="Parent_gestion_des_demandes.php">
            <i class="bi bi-card-list"></i>
            <span>Gestion des demandes</span>
          </a>
        </li><!-- End Register Page Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="Parent_profil.php">
          <i class="bi bi-person-square"></i>
          <span>Profil</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
       
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="Parent_assistance.php">
          <i class="bi bi-question-square"></i>
          <span>Assistance</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      

      

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gestion des demandes</h1>
      
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Proposer votre mot</h5>
        
            <!-- General Form Elements -->
            <form method="POST" action="ajout_mot.php">
            <div class="row mb-3">
                <input type="text" name="mot" class="form-control"  required>
            </div>
            
            <div class="row mb-3">
                <center><button type="submit" class="btn btn-primary">Envoyer</button></center>
            </div>
          </form><!-- End General Form Elements -->
          </div>
          </div>

        </div>



        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Demandes proposés</h5>

              <!-- Advanced Form Elements -->
              <form>
              <div style="max-height: 300px; overflow-y: scroll;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Mot</th>
                <th scope="col">Date Ajout</th>
                <th scope="col">Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db_conn.php";

            // Fetch data from the database
            //$sql = "SELECT mot, date_ajout, statut FROM demande";

            //  $id_parent = $_SESSION['id_parent'];
            $sql = "SELECT mot, date_ajout, statut FROM demande WHERE id_parent = '$id_parent'";
            $result = mysqli_query($conn, $sql);

            // Display data in the table
            while ($row = mysqli_fetch_assoc($result)) {
                $mot = $row['mot'];
                $date_ajout = $row['date_ajout'];
                $statut = $row['statut'];
            ?>
                <tr>
                    <td><?php echo $mot; ?></td>
                    <td><?php echo $date_ajout; ?></td>
                    <td><button type="button" class="btn btn-outline-warning btn-sm"><?php echo $statut; ?></button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
        <div class="col-xl-6">
          <div class="card p-3">
            <h5 class="card-title">Ajouter une réclamation</h5>
            <form action="reclamation.php" method="post" >
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  

                  <button type="submit" class="btn btn-success">Réclamer</button>
                </div>

              </div>
            </form>
          </div>

        </div>
        <div class="col-lg-12">
          
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Statistiques</h5>

                <!-- Doughnut Chart -->
                <?php include 'piechart.php'; ?>
                <!-- End Doughnut CHart -->

              </div>
            
          </div>



        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

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