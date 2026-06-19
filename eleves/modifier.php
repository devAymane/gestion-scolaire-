<?php
require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM eleve WHERE id_eleve=?");
$stmt->execute([$id]);

$eleve = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$eleve){
    die("Élève introuvable");
}

if(isset($_POST['modifier'])){

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $date_naissance = $_POST['date_naissance'];
    $adresse = trim($_POST['adresse']);
    $telephone = trim($_POST['telephone']);

    $sql = "UPDATE eleve
            SET nom=?,
                prenom=?,
                date_naissance=?,
                adresse=?,
                telephone=?
            WHERE id_eleve=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nom,
        $prenom,
        $date_naissance,
        $adresse,
        $telephone,
        $id
    ]);

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
include "../includes/navbar.php";
?>

<h2>Modifier un élève</h2>

<form method="POST">

    <label>Nom</label><br>
    <input type="text" name="nom"
           value="<?= htmlspecialchars($eleve['nom']) ?>" required><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom"
           value="<?= htmlspecialchars($eleve['prenom']) ?>" required><br><br>

    <label>Année Naissance</label><br>
    <input type="number" name="date_naissance"
           value="<?= htmlspecialchars($eleve['date_naissance']) ?>" required><br><br>

    <label>Adresse</label><br>
    <input type="text" name="adresse"
           value="<?= htmlspecialchars($eleve['adresse']) ?>" required><br><br>

    <label>Téléphone</label><br>
    <input type="text" name="telephone"
           value="<?= htmlspecialchars($eleve['telephone']) ?>" required><br><br>

    <button type="submit" name="modifier">Modifier</button>

</form>

<?php include "../includes/footer.php"; ?>