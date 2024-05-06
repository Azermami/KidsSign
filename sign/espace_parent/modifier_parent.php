<?php
session_start();
$id_parent = $_SESSION['id_parent'];
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations de l'utilisateur à partir de la base de données
    
    $query = "SELECT * FROM parent WHERE id_parent = $id_parent";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : $row['nom'];
        $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : $row['prenom'];
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : $row['email'];
        $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : $row['telephone'];
        
 
 
 
        // Requête de mise à jour des informations de l'utilisateur
        $updateQuery = "UPDATE parent SET nom='$nom', prenom='$prenom', email='$email', telephone='$telephone' WHERE id_parent='$id_parent'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
			
			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
              echo '<meta http-equiv="refresh" content="0;URL=Parent_profil.php">';
        } else {
            echo "Erreur lors de la mise à jour des champs : " . mysqli_error($conn);
        }
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
}


?>