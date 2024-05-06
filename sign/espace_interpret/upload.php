<?php 
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
   $id = $_POST['id'];
   var_dump($_FILES['my_video']);
   print_r($_FILES['my_video']);
   
   include "db_conn.php";

   // Check if video file exists
   if (!empty($_FILES['my_video']['name'])) {
      $video_name = $_FILES['my_video']['name'];
      $video_size = $_FILES['my_video']['size'];
      $video_tmp_name = $_FILES['my_video']['tmp_name'];
      $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
      $video_ex_lc = strtolower($video_ex);
      $allowed_video_exs = array("mp4", "mov");

      if (in_array($video_ex_lc, $allowed_video_exs)) {
         $new_video_name = $video_name;
         $video_upload_path = 'videos/'.$new_video_name;
         move_uploaded_file($video_tmp_name, $video_upload_path);
      } else {
         $em = "You can't upload files of this type";
         header("Location: Interpret_Liste_des_nouveaux_mots.php?error=$em");
         exit();
      }
   } else {
      $em = "You must select a file to upload";
      header("Location: Interpret_Liste_des_nouveaux_mots.php?error=$em");
      exit();
   }

   // Insert into Database
   var_dump($new_video_name);
   var_dump($id);
   $sql = "UPDATE affectation 
           SET video_recu='$new_video_name' 
           WHERE id_demande='$id' AND etat='sent'";

   if(mysqli_query($conn, $sql)) {
      header("Location: Interpret_Liste_des_nouveaux_mots.php");
      exit();
   } else {
      $em = "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("Location: Interpret_Liste_des_nouveaux_mots.php?error=$em");
      exit();
   }
} else {
   $em = "You must select a file to upload";
   header("Location: Interpret_Liste_des_nouveaux_mots.php?error=$em");
   exit();
}
?>
