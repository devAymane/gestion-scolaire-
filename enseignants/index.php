<?php
require_once "../cnx.php";

$sql = "SELECT * FROM enseignant";
$stmt = $pdo->query($sql);
$enseignants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des enseignants</h2>

<a href="ajouter.php">Ajouter un enseignant</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </tr>

    <?php foreach($enseignants as $e): ?>
    <tr>
        <td><?= $e['id_enseignant'] ?></td>
        <td><?= $e['nom'] ?></td>
        <td><?= $e['prenom'] ?></td>
        <td><?= $e['email'] ?></td>
        <td><?= $e['telephone'] ?></td>

        <td>
            <a href="modifier.php?id=<?= $e['id_enseignant'] ?>">Modifier</a>
            <a href="supprimer.php?id=<?= $e['id_enseignant'] ?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>