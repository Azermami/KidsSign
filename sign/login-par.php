<?php
include "db_conn.php";
session_start();

$message = "";

if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $username = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['pwd']);

    $sql = "SELECT * FROM parent WHERE login = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($pwd == $row['mot_de_passe']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_parent'] = $row['id_parent'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];

            header('Location: espace_parent/Parent_gestion_des_demandes.php');
            exit();
        } else {
            $message = "Le mot de passe est incorrect.";
            echo "<script>alert('$message');</script>";
            header('Location: parent-login.php');
            exit();
        }
    } else {
        $message = "Le login n'existe pas.";
        echo "<script>alert('$message');</script>";
        header('Location: parent-login.php');
        exit();
    }
} else {
    $message = "Les variables du formulaire ne sont pas déclarées.";
    echo "<script>alert('$message');</script>";
    header('Location: parent-login.php');
    exit();
}
?>
