<!DOCTYPE html>
<html>
<head>
	<title>Titre de la page</title>
</head>
<body>
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
	    $sql = "SELECT * FROM signe";
	    $stmt = $pdo->query($sql);
	    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    if (count($rows) > 0) {
	        echo '<table border="1px">';
	        echo "<tr>";
	        echo "<th>id </th>";
	        echo "<th>mot_arabe </th>";
	        echo "<th>mot_francais</th>";
	        echo "<th>image</th>";
	        echo "<th>video</th>";
	        echo "<th>tag</th>";
	        echo "<th>id_interpret</th>";
	        
	        foreach ($rows as $row) {
	            echo "<tr>";
	            echo "<td>" . $row['id_signe'] . "</td>";
	            echo "<td>" . $row['mot_ar'] . "</td>";
	            echo "<td>" . $row['mot_fr'] . "</td>";
	            echo "<td><img src='uploads/".$row['image']."' width='100px' height='100px'></td>";
	            echo "<td><video src='videos/".$row['video']."' width='100px' height='100px'></td>";			
	            echo "<td>" . $row['tag'] . "</td>";
	            echo "<td>" . $row['id_interpret'] . "</td>";
	            
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
