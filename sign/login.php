<?php
include "db_conn.php";
session_start();

$message = "";

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = htmlspecialchars($_POST['login']);
    $pwd = htmlspecialchars($_POST['pwd']);

    // requête pour récupérer les identifiants de connexion depuis la base de données
    $sql = "SELECT * FROM interpret WHERE login = '$login'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($pwd == $row['mot_de_passe']) {
            $_SESSION['login'] = $row['login'];
            $_SESSION['pwd'] = $row['mot_de_passe'];
            header('Location:espace_interpret/Interpret_Liste_des_nouveaux_mots.php');
            exit();
        } else {
            $message = "Il faut vérifier que votre mot de passe est incorrect.";
        }
    } else {
        $message = "Le login n'existe pas.";
    }
} else {
    $message = "Les variables du formulaire ne sont pas déclarées.";
}
?>