<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'sourd';

// Create a new MySQLi object and establish the connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection status
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $titre = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $description = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Check if inputs are not empty
    if (empty($titre) || empty($description)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO reclamation (titre, description, date_reclamation) VALUES (?, ?, NOW())";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $titre, $description);
        if ($stmt->execute()) {
            echo "New row inserted successfully.";
        } else {
            echo "Error inserting row: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$mysqli->close();

// Redirect after processing the form
header('Location: Parent_gestion_des_demandes.php');
?>
