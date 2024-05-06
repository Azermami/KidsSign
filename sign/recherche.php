<?php
session_start();
include 'db_conn.php';

$searchTerm = $_POST['signe'];

// Requête de recherche
$sql = "SELECT id_signe, mot_ar, mot_fr, image, video, tag, id_interpret FROM signe WHERE `mot_fr` LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Affichage des résultats de la recherche
if ($result->num_rows > 0) {
    echo '<section id="recherche-results">'; // Opening the section for search results

    while ($row = $result->fetch_assoc()) {
        // Afficher les résultats ici
        echo $row['mot_fr'] . "<br>";
    }

    echo '</section>'; // Closing the section for search results
} else {
    echo "No results found.";
}

$conn->close();
?>
