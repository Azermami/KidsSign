 <?php 
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);
		$allowed_exs = array("jpg", "jpeg", "png"); 

		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = 'uploads/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

			// Check if video file exists
			if (isset($_FILES['my_video']) && $_FILES['my_video']['error'] === 0) {
				$video_name = $_FILES['my_video']['name'];
				$video_size = $_FILES['my_video']['size'];
				$video_tmp_name = $_FILES['my_video']['tmp_name'];
				$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
				$video_ex_lc = strtolower($video_ex);
				$allowed_video_exs = array("mp4", "mov");

				if (in_array($video_ex_lc, $allowed_video_exs)) {
					$new_video_name = uniqid("VID-", true).'.'.$video_ex_lc;
					$video_upload_path = 'videos/'.$new_video_name;
					move_uploaded_file($video_tmp_name, $video_upload_path);
				} else {
					$em = "You can't upload files of this type";
					header("Location: index1.php?error=$em");
					exit();
				}
			} else {
				$new_video_name = null;
			}

			// Insert into Database
			$sql = "INSERT INTO `signe`(`id_signe`, `mot_ar`, `mot_fr`, `image`, `video`, `tag`, `id_interpret`) 
					VALUES('{$_POST['id_signe']}', '{$_POST['mot_ar']}', '{$_POST['mot_fr']}', '$new_img_name', '$new_video_name', '{$_POST['tag']}', '{$_POST['id_interpret']}')";

			mysqli_query($conn, $sql);
			header("Location: view1.php");
			exit();
		} else {
			$em = "You can't upload files of this type";
			header("Location: index1.php?error=$em");
			exit();
		}
	} else {
		$em = "unknown error occurred!";
		header("Location: index1.php?error=$em");
		exit();
	}
} else {
	header("Location: index1.php");
	exit();
}