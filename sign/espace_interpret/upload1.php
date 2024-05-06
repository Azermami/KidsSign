<?php
session_start(); // Démarre la session si ce n'est pas déjà fait
include "db_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["my_image"])) {
    $file = $_FILES["my_image"];
    $fileName = $file["name"];
    $fileTmp = $file["tmp_name"];
    $fileError = $file["error"];

    if ($fileError === 0) {
        $uploadDir = "espace_interpret/uploads/";
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = "profile_" . uniqid() . "." . $fileExtension;
        $uploadPath = $uploadDir . $newFileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Crée le répertoire s'il n'existe pas déjà
        }

        if (move_uploaded_file($fileTmp, $uploadPath)) {
            // Mettre à jour le nom de fichier dans la base de données
            $id_interpret = $_SESSION['id_interpret'];
            $updatePhotoQuery = "UPDATE interpret SET photo='$newFileName' WHERE id_interpret=$id_interpret";
            $updatePhotoResult = mysqli_query($conn, $updatePhotoQuery);

            if ($updatePhotoResult) {
                header('location:Interprete_profil.php');
            } else {
                echo "Erreur lors de la mise à jour de l'image de profil : " . mysqli_error($conn);
            }
        } else {
            echo "Erreur lors du téléchargement de l'image de profil.";
        }
    } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image de profil : code d'erreur " . $fileError;
    }
}

$id_interpret = $_SESSION['id_interpret'];
$sql = "SELECT photo FROM interpret WHERE id_interpret = $id_interpret";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $photo = $row['photo'];
    if (!empty($photo)) {
        echo '<img src="espace_interpret/uploads/' . $photo . '" alt="Profile">';
    } else {
       echo '<img width="120px" height="120px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
    }
} else {
   echo '<img width="120px" height="120px" src="assets/img/img-profil.png" alt="Profile" class="rounded-circle">';
}

mysqli_close($conn);
?>
