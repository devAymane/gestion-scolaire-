<?php
require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
"SELECT * FROM affectation WHERE id_AFFECTATION=?"
);

$stmt->execute([$id]);

$affectation = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['modifier'])){

    $sql = "UPDATE affectation
            SET id_matiere=?,
                id_classe=?,
                id_enseignant=?,
                annee_scolaire=?
            WHERE id_AFFECTATION=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['id_matiere'],
        $_POST['id_classe'],
        $_POST['id_enseignant'],
        $_POST['annee_scolaire'],
        $id
    ]);

    header("Location:index.php");
    exit;
}

$matieres = $pdo->query("SELECT * FROM matiere");
$classes = $pdo->query("SELECT * FROM classe");
$enseignants = $pdo->query("SELECT * FROM enseignant");

include "../includes/header.php";
include "../includes/navbar.php";
?>

<h2>Modifier Affectation</h2>

<form method="POST">

<label>Matière</label><br>
<select name="id_matiere">
<?php while($m = $matieres->fetch(PDO::FETCH_ASSOC)): ?>
<option value="<?= $m['id_matiere'] ?>">
<?= $m['nom_matiere'] ?>
</option>
<?php endwhile; ?>
</select><br><br>

<label>Classe</label><br>
<select name="id_classe">
<?php while($c = $classes->fetch(PDO::FETCH_ASSOC)): ?>
<option value="<?= $c['id_classe'] ?>">
<?= $c['nom_classe'] ?>
</option>
<?php endwhile; ?>
</select><br><br>

<label>Enseignant</label><br>
<select name="id_enseignant">
<?php while($e = $enseignants->fetch(PDO::FETCH_ASSOC)): ?>
<option value="<?= $e['id_enseignant'] ?>">
<?= $e['nom']." ".$e['prenom'] ?>
</option>
<?php endwhile; ?>
</select><br><br>

<label>Année scolaire</label><br>
<input type="number"
       name="annee_scolaire"
       value="<?= $affectation['annee_scolaire'] ?>"
       required><br><br>

<button type="submit" name="modifier">
Modifier
</button>

</form>

<?php include "../includes/footer.php"; ?>