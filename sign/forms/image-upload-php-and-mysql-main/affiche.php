<?php
//connect to mysql server with username password and database name
$servname = 'localhost';
$dbname = 'sourd';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create query to select data
    $sql = "SELECT * FROM interpret";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        echo '<table border="1px">';
        echo "<tr>";
        echo "<th>id </th>";
        echo "<th>nom (INR)</th>";
        echo "<th>prenom</th>";
        echo "<th>photo</th>";
        echo "<th>email</th>";
        echo "<th>telephone</th>";
        echo "<th>pays</th>";
        echo "<th>association</th>";
        echo "<th>login </th>";
        echo "<th>mot de passe</th>";
        echo "</tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_interpret'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td><img src='uploads/".$row['photo']."' width='100px' height='100px'></td>";			
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "<td>" . $row['pays'] . "</td>";
            echo "<td>" . $row['association'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['mot_de_passe'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

</body>
</html>
