<!DOCTYPE html>
<html>
<head>
	<title>Image et vidio Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
</head>
<body>


<head>
    
    <title>formulaire</title>
</head>
<body>
<form action="upload1.php"
           method="post"
           enctype="multipart/form-data">

           

       
     	
     

<label>id_signe</label>
<input type="text" name="id_signe"> <br/>

<label>mot_ar</label>
<input type="text" name="mot_ar"> <br/>

<label>mot_fr</label>
<input type="text" name="mot_fr"> <br/>
<input type="file" 
                  name="my_image">  <br/>

<input type="file" 
                  name="my_video">  <br/>
<label>tag</label>
<input type="text" name="tag"> <br/>

<label>id_interpret</label>
<input type="text" name="id_interpret"> <br/>

<input type="submit" 
                  name="submit"
                  value="Upload">
</form>
    

</body>
</html>
<?php
if(isset($_POST['submit'])){
    $id_signe = $_POST['id_signe'];
    $mot_ar = $_POST['mot_ar'];
    $mot_fr = $_POST['mot_fr'];
    $tag = $_POST['tag'];
    $id_interpret = $_POST['id_interpret'];
    
    // Traitement de l'image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    
    if(in_array($imageFileType,$extensions_arr)){
        if(move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)){
            // Enregistrement des données dans la base de données
            $query = "INSERT INTO signe (id_signe, mot_ar, mot_fr, image,video, tag, id_interpret) VALUES ('$id_signe', '$mot_ar', '$mot_fr', '$target_file', '$tag', '$id_interpret')";
            mysqli_query($conn,$query);
            
            echo "Le fichier ". basename( $_FILES["my_image"]["name"]). " a été téléchargé avec succès.";
        }
    }
    
    // Traitement de la vidéo
    $target_dir = "videos/";
    $target_file = $target_dir . basename($_FILES["my_video"]["name"]);
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("mp4","avi","mov","mpeg");
    
    if(in_array($videoFileType,$extensions_arr)){
        if(move_uploaded_file($_FILES["my_video"]["tmp_name"], $target_file)){
            // Enregistrement des données dans la base de données
           $query = "UPDATE signe SET video = '$target_file' WHERE id_signe = '$id_signe'";

            mysqli_query($conn,$query);
            
            echo "Le fichier ". basename( $_FILES["my_video"]["name"]). " a été téléchargé avec succès.";
        }
    }
}
?>