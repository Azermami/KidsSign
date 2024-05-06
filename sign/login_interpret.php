<?php
include "db_conn.php";
session_start();

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = htmlspecialchars($_POST['login']);
    $pwd = htmlspecialchars($_POST['pwd']);

    // requête pour récupérer les identifiants de connexion depuis la base de données
    $sql = "SELECT * FROM interpret WHERE login = '$login'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($pwd == $row['mot_de_passe']) {
            $_SESSION['id_interpret'] = $row['id_interpret'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['pwd'] = $row['mot_de_passe'];
            header('Location: espace_interpret/Interpret_Liste_des_nouveaux_mots.php');
            exit();
        }
    }
      header('Location: interpret-logine.php');
    exit();
}
?>

<!-- Code HTML -->
<div class="card mb-3">
  <!-- Reste du code HTML -->
</div>