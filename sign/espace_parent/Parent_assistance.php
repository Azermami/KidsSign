<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Assistances</title>
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
            <h6> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h6>
             
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Parent_profil.php">
                <i class="bi bi-person"></i>
                <span>My Profil</span>
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
      <h1>Assistance</h1>
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-6">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Questions d'aide à l'utilisation</h5>

              <div>
                <h6>1.Comment proposer un mot ?</h6>
                <p>Dans la section "Gestion des demandes", le parent peut saisir le mot qu'il
                  souhaite faire traduire en langue des signes tunisienne. Il est important
                  de noter que le traitement des demandes de traduction peut prendre un
                  certain temps, en fonction de la disponibilité des interprètes</p>
              </div>

              <div class="pt-2">
                <h6>2. Comment ajouter une réclamation ?</h6>
                <p>Si vous avez rencontré un problème ou si vous avez une suggestion d'amélioration, nous sommes là pour vous aider. Nous prenons toutes les commentaires au sérieux et nous nous engageons à fournir une solution rapide et efficace. Pour déposer votre opinion, cliquez sur le bouton "Réclamer" de l'application et écrivez en détail ce que vous voulez dire.</p>
              </div>

             

            </div>
          </div>

          <!-- F.A.Q Group 1 -->
          

        </div>

        <div class="col-lg-6">

          <!-- F.A.Q Group 2 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Questions pertinantes</h5>

              <div class="accordion accordion-flush" id="faq-group-2">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                      Pourquoi ma demnde a été annulée?
                    </button>
                  </h2>
                  <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Veuillez noter que la demande du parent peut être annulée si le mot
                      souhaité existe déjà ou est déjà proposé par un autre parent.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                      Combien de temps dure l'interprétation de la demande ?
                    </button>
                  </h2>
                  <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Veuillez noter que le traitement de la demande peut prendre entre deux et trois jours et que cela dépend de la disponibilité des interprètes. </div>
                  </div>
                </div>

                

                

                

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5" type="button" data-bs-toggle="collapse">
                      Pourquoi envoyer une réclamation?
                    </button>
                  </h2>
                  <div id="faqsTwo-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      N'hésitez pas à nous faire part de vos commentaires et opinions afin d'améliorer la qualité de nos fonctionnalités.
                    </div>
                    
                  </div>
                </div>

                <div class="accordion accordion-flush" id="faq-group-3">

                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                        A quoi servent les notifications ?

                      </button>
                    </h2>
                    <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                      <div class="accordion-body">
                        Les notifications sont utilisés pour vous informer de la finalisation de vos demandes. Ainsi, dès que le signe correspondant à votre demande est ajouté au site, une notification vous est envoyée
                      </div>
                    
                  </div>
  
                 
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      A quoi sert le bloc de statistiques ?
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Le bloc de statistiques de la section "Gestion des demandes" vous donne un aperçu du nombre de mots que vous avez soumis par rapport au nombre total de mots interprétés. Il s'agit du nombre de mots que vous avez contribué à ajouter à notre liste de signes.
                    </div>
                  </div>
                </div>


                

                


                


             


                

              </div>


              
              

            </div>
            
          </div><!-- End F.A.Q Group 2 -->

          <!-- F.A.Q Group 3 -->
         

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