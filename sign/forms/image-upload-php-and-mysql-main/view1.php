<?php 
include "db_conn.php"; 

$sql = "SELECT * FROM signe ORDER BY id_interpret DESC";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img, .alb video {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<a href="index1.php">&#8592;</a>
	<?php 
		while ($row = mysqli_fetch_assoc($res)) {
			$filetype = pathinfo($row['image'], PATHINFO_EXTENSION);
			if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png" || $filetype == "gif") {  
	?>
		<div class="alb">
			<a href="uploads/<?=$row['image']?>" target="_blank">
				<img src="uploads/<?=$row['image']?>">
			</a>
		</div>
	<?php 
			} 
			else if ($filetype == "mp4" || $filetype == "mov") { 
	?>
		<div class="alb">
			<video controls>
				<source src="videos/<?=$row['video']?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
	<?php 
			}
		}
	?>
</body>
</html>
<?php 
	} else {
		echo "No files found.";
	}
?>
