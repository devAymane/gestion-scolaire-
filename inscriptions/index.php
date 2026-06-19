<?php

require_once "../cnx.php";

$sql = "SELECT
i.id_inscrire,
e.nom,
e.prenom,
c.nom_classe,
i.date_inscription

FROM inscrire i

INNER JOIN eleve e
ON i.id_eleve=e.id_eleve

INNER JOIN classe c
ON i.id_classe=c.id_classe";

$stmt = $pdo->query($sql);

$inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Liste des inscriptions</h2>

<a href="ajouter.php">Ajouter inscription</a>

<table border="1">

<tr>
<th>ID</th>
<th>Élève</th>
<th>Classe</th>
<th>Date</th>
<th>Actions</th>
</tr>

<?php foreach($inscriptions as $i): ?>

<tr>

<td><?= $i['id_inscrire'] ?></td>

<td>
<?= $i['nom']." ".$i['prenom'] ?>
</td>

<td>
<?= $i['nom_classe'] ?>
</td>

<td>
<?= $i['date_inscription'] ?>
</td>
<td>
<a href="modifier.php?id=<?= $i['id_inscrire'] ?>">
Modifier
</a>

<a href="supprimer.php?id=<?= $i['id_inscrire'] ?>">
Supprimer
</a>
</td>
</tr>

<?php endforeach; ?>

</table>