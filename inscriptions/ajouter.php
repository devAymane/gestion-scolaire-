<?php

require_once "../config.php";

$eleves = $pdo->query(
"SELECT * FROM eleve"
)->fetchAll(PDO::FETCH_ASSOC);

$classes = $pdo->query(
"SELECT * FROM classe"
)->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['id_eleve'])){

$stmt = $pdo->prepare(
"INSERT INTO inscrire
(id_eleve,id_classe,id_inscrire,date_inscription)

VALUES(?,?,?,?)"
);

$stmt->execute([
$_POST['id_eleve'],
$_POST['id_classe'],
$_POST['id_inscrire'],
$_POST['date_inscription']
]);

header("Location:index.php");
}
?>

<form method="POST">

Élève :

<select name="id_eleve">

<?php foreach($eleves as $e): ?>

<option value="<?= $e['id_eleve'] ?>">
<?= $e['nom']." ".$e['prenom'] ?>
</option>

<?php endforeach; ?>

</select>

<br><br>

Classe :

<select name="id_classe">

<?php foreach($classes as $c): ?>

<option value="<?= $c['id_classe'] ?>">
<?= $c['nom_classe'] ?>
</option>

<?php endforeach; ?>

</select>

<br><br>

ID inscription :

<input type="number"
name="id_inscrire">

<br><br>

Date :

<input type="date"
name="date_inscription">

<br><br>

<button type="submit">
Ajouter
</button>

</form>

<?php include "../includes/footer.php"; ?>