<?php
require_once "../config.php";

if(isset($_POST['ajouter'])){

    $nom_classe = $_POST['nom_classe'];
    $niveau = $_POST['niveau'];
    $capacite_max = $_POST['capacite_max'];

    $stmt = $pdo->prepare(
        "INSERT INTO classe(nom_classe,niveau,capacite_max)
         VALUES(?,?,?)"
    );

    $stmt->execute([
        $nom_classe,
        $niveau,
        $capacite_max
    ]);

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/navbar.php";
?>

<h2>Ajouter Classe</h2>

<form method="POST">

<label>Nom Classe</label><br>
<input type="text" name="nom_classe" required><br><br>

<label>Niveau</label><br>
<input type="text" name="niveau" required><br><br>

<label>Capacité Max</label><br>
<input type="number" name="capacite_max" required><br><br>

<button type="submit" name="ajouter">
Ajouter
</button>

</form>

<?php include "../includes/footer.php"; ?>