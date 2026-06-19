<?php
require_once "../config.php";
include "../includes/header.php";
include "../includes/navbar.php";

$stmt = $pdo->query("SELECT * FROM eleve");
$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des Élèves</h2>

<a href="ajouter.php">➕ Ajouter un élève</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date Naissance</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </tr>

    <?php foreach($eleves as $eleve): ?>
    <tr>
        <td><?= htmlspecialchars($eleve['id_eleve']) ?></td>
        <td><?= htmlspecialchars($eleve['nom']) ?></td>
        <td><?= htmlspecialchars($eleve['prenom']) ?></td>
        <td><?= htmlspecialchars($eleve['date_naissance']) ?></td>
        <td><?= htmlspecialchars($eleve['adresse']) ?></td>
        <td><?= htmlspecialchars($eleve['telephone']) ?></td>
        <td>
            <a href="modifier.php?id=<?= $eleve['id_eleve'] ?>">✏ Modifier</a>
            <a href="supprimer.php?id=<?= $eleve['id_eleve'] ?>" onclick="return confirm('Supprimer cet élève ?')">🗑 Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include "../includes/footer.php"; ?>