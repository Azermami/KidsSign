<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'sourd';


$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection status
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}


session_start();

if(isset($_SESSION['id_parent']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
  $id_parent = $_SESSION['id_parent'];
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
}

if (isset($_POST['mot'])) {
    
    $mot = $_POST['mot'];
    $date_ajout = date("Y-m-d"); 
    $statut = "Nouveau"; 
    $id_parentt =  $id_parent;
    

    // Construct the SQL query
    $sql = "INSERT INTO demande (mot, date_ajout, statut, id_parent) VALUES ('$mot', '$date_ajout', '$statut', '$id_parentt')";

    
    if ($mysqli->query($sql)) {
        echo "New row inserted successfully.";
    } else {
        echo "Error inserting row: " . $mysqli->error;
    }

    

} else {
    echo "Veuillez entrer un mot.";
}
$mysqli->close();
header('Location: Parent_gestion_des_demandes.php');


?>
