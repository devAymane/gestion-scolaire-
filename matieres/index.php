<?php
require_once "../cnx.php";

$stmt = $pdo->query("SELECT * FROM matiere");
$matieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des matières</h2>

<a href="ajouter.php">Ajouter une matière</a>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nom Matière</th>
    <th>Actions</th>
</tr>

<?php foreach($matieres as $m): ?>

<tr>
    <td><?= $m['id_matiere'] ?></td>
    <td><?= $m['nom_matiere'] ?></td>

    <td>
        <a href="modifier.php?id=<?= $m['id_matiere'] ?>">Modifier</a>
        <a href="supprimer.php?id=<?= $m['id_matiere'] ?>">Supprimer</a>
    </td>
</tr>

<?php endforeach; ?>

</table>