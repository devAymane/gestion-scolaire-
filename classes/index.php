<?php
require_once "../config.php";
include "../includes/header.php";
include "../includes/navbar.php";

$stmt = $pdo->query("SELECT * FROM classe");
?>

<h2>Liste des Classes</h2>

<a href="ajouter.php">➕ Ajouter Classe</a>

<table>
<tr>
    <th>ID</th>
    <th>Nom Classe</th>
    <th>Niveau</th>
    <th>Capacité</th>
    <th>Actions</th>
</tr>

<?php while($classe = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= htmlspecialchars($classe['id_classe']) ?></td>
    <td><?= htmlspecialchars($classe['nom_classe']) ?></td>
    <td><?= htmlspecialchars($classe['niveau']) ?></td>
    <td><?= htmlspecialchars($classe['capacite_max']) ?></td>

    <td>
        <a href="modifier.php?id=<?= $classe['id_classe'] ?>">Modifier</a>
        <a href="supprimer.php?id=<?= $classe['id_classe'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<?php include "../includes/footer.php"; ?>