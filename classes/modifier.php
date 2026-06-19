<?php
require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM classe WHERE id_classe=?"
);

$stmt->execute([$id]);

$classe = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$classe){
    die("Classe introuvable");
}

if(isset($_POST['modifier'])){

    $stmt = $pdo->prepare(
        "UPDATE classe
         SET nom_classe=?,
             niveau=?,
             capacite_max=?
         WHERE id_classe=?"
    );

    $stmt->execute([
        $_POST['nom_classe'],
        $_POST['niveau'],
        $_POST['capacite_max'],
        $id
    ]);

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/navbar.php";
?>

<h2>Modifier Classe</h2>

<form method="POST">

<label>Nom Classe</label><br>
<input type="text"
       name="nom_classe"
       value="<?= htmlspecialchars($classe['nom_classe']) ?>"
       required><br><br>

<label>Niveau</label><br>
<input type="text"
       name="niveau"
       value="<?= htmlspecialchars($classe['niveau']) ?>"
       required><br><br>

<label>Capacité Max</label><br>
<input type="number"
       name="capacite_max"
       value="<?= htmlspecialchars($classe['capacite_max']) ?>"
       required><br><br>

<button type="submit" name="modifier">
Modifier
</button>

</form>

<?php include "../includes/footer.php"; ?>