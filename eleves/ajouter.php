<?php
require_once "../config.php";

if(isset($_POST['ajouter'])){

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $date_naissance = $_POST['date_naissance'];
    $adresse = trim($_POST['adresse']);
    $telephone = trim($_POST['telephone']);

    $sql = "INSERT INTO eleve(nom, prenom, date_naissance, adresse, telephone)
            VALUES(?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nom,
        $prenom,
        $date_naissance,
        $adresse,
        $telephone
    ]);

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
include "../includes/navbar.php";
?>

<h2>Ajouter un élève</h2>

<form method="POST">

    <label>Nom</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom" required><br><br>

    <label>Année Naissance</label><br>
    <input type="number" name="date_naissance" required><br><br>

    <label>Adresse</label><br>
    <input type="text" name="adresse" required><br><br>

    <label>Téléphone</label><br>
    <input type="text" name="telephone" required><br><br>

    <button type="submit" name="ajouter">Ajouter</button>

</form>

<?php include "../includes/footer.php"; ?>