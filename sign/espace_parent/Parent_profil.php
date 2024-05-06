<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil</title>
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

        <li class="nav-item dropdown">

         

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              tu as recu une nouvelle notification
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">voir le tout</span></a>
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

            

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">voir toute les notification</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

        

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              tu as recu un noveau message
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">voir tout</span></a>
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
              <a href="#">voir tout les messages</a>
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
                    $photo = $row['image'];
                    if (!empty($photo)) {
                    echo '<img width="50px" height="50px" src="espace_parent/uploads/' . $photo . '" alt="Profile" class="rounded-circle">';
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
              <h6><h6> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h6></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Parent_profil.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Parent_assistance.php">
                <i class="bi bi-question-circle"></i>
                <span>Assistance</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../parent-login.php">
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
      <h1>Profil</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <?php
 include "db_conn.php";
 $id_parent = $_SESSION['id_parent'];
 $sql = "SELECT image FROM parent WHERE id_parent = $id_parent";
 $res = mysqli_query($conn, $sql);



 if (mysqli_num_rows($res) > 0) {
 $row = mysqli_fetch_assoc($res);
 $photo = $row['image'];
 if (!empty($photo)) {
 echo '<img width="120px" height="120px" src="espace_parent/uploads/' . $photo . '" alt="Profile" class="rounded-circle">';
 } else {
 echo '<img width="120px" height="120px" src="assets/img/ano.jpg" alt="Profile" class="rounded-circle">';
 }
 }



 mysqli_close($conn);
 ?>
              <h2><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h2>
              <h3>Parent</h3>
              
              
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
    $id_parent = $_SESSION['id_parent'];
    $query = "SELECT * FROM parent WHERE id_parent = $id_parent"; 
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Nom et prénom</div>
    <div class="col-lg-9 col-md-8"><?php echo $row["nom"] . " " . $row["prenom"]; ?></div>
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

                <form method="post" action="upload1.php" enctype="multipart/form-data">
                              <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image de profil</label>
                              <div class="col-md-8 col-lg-9">
                              <?php
                              include "db_conn.php";
                              $id_parent = $_SESSION['id_parent'];
                              $sql = "SELECT image FROM parent WHERE id_parent = $id_parent";
                              $res = mysqli_query($conn, $sql);



                              if (mysqli_num_rows($res) > 0) {
                              $row = mysqli_fetch_assoc($res);
                              $photo = $row['image'];
                              if (!empty($photo)) {
                              echo '<img width="120px" height="120px" src="espace_parent/uploads/' . $photo . '" alt="Profile" class="rounded-circle">';
                              } else {
                              echo '<img width="120px" height="120px" src="assets/img/ano.jpg" alt="Profile" class="rounded-circle">';
                              }
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

                  <!-- Profile Edit Form -->
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

 

<div class="text-center">
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</div>
</form><!-- End Profile Edit Form -->

                </div>

                

              </div><!-- End Bordered Tabs -->

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