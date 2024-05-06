<?php
include 'db_conn.php';

if (isset($_SESSION['id_parent']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
    $id_parent = $_SESSION['id_parent'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    $query = "SELECT * FROM parent WHERE id_parent = $id_parent";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <div class="row">
            <div class="col-lg-3 col-md-4 label">Nom et prénom</div>
            <div class="col-lg-9 col-md-8"><?php echo $row["nom"] . ' ' . $row["prenom"]; ?></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label">Téléphone</div>
            <div class="col-lg-9 col-md-8"><?php echo $row["telephone"]; ?></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 label">E-mail</div>
            <div class="col-lg-9 col-md-8"><?php echo $row["email"]; ?></div>
        </div>
<?php
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
}
?>
