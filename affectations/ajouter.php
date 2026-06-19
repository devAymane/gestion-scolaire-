<?php
require_once "../config.php";

if(isset($_POST['ajouter'])){

    $id_matiere = $_POST['id_matiere'];
    $id_classe = $_POST['id_classe'];
    $id_enseignant = $_POST['id_enseignant'];
    $id_AFFECTATION = $_POST['id_AFFECTATION'];
    $annee_scolaire = $_POST['annee_scolaire'];

    $sql = "INSERT INTO affectation
            (id_matiere,id_classe,id_enseignant,id_AFFECTATION,annee_scolaire)
            VALUES (?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $id_matiere,
        $id_classe,
        $id_enseignant,
        $id_AFFECTATION,
        $annee_scolaire
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

<h2>Ajouter Affectation</h2>

<form method="POST">

<label>ID Affectation</label><br>
<input type="number" name="id_AFFECTATION" required><br><br>

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
<input type="number" name="annee_scolaire" required><br><br>

<button type="submit" name="ajouter">
Ajouter
</button>

</form>

<?php include "../includes/footer.php"; ?>