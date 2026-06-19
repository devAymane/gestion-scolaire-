<?php
require_once "../config.php";
include "../includes/header.php";
include "../includes/navbar.php";

$sql = "SELECT a.id_AFFECTATION,
               m.nom_matiere,
               c.nom_classe,
               e.nom,
               e.prenom,
               a.annee_scolaire
        FROM affectation a
        INNER JOIN matiere m ON a.id_matiere = m.id_matiere
        INNER JOIN classe c ON a.id_classe = c.id_classe
        INNER JOIN enseignant e ON a.id_enseignant = e.id_enseignant";

$stmt = $pdo->query($sql);
?>

<h2>Liste des Affectations</h2>

<a href="ajouter.php">Ajouter Affectation</a>

<table>
<tr>
    <th>ID</th>
    <th>Matière</th>
    <th>Classe</th>
    <th>Enseignant</th>
    <th>Année</th>
    <th>Actions</th>
</tr>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= htmlspecialchars($row['id_AFFECTATION']) ?></td>
    <td><?= htmlspecialchars($row['nom_matiere']) ?></td>
    <td><?= htmlspecialchars($row['nom_classe']) ?></td>
    <td><?= htmlspecialchars($row['nom']." ".$row['prenom']) ?></td>
    <td><?= htmlspecialchars($row['annee_scolaire']) ?></td>

    <td>
        <a href="modifier.php?id=<?= $row['id_AFFECTATION'] ?>">Modifier</a>
        <a href="supprimer.php?id=<?= $row['id_AFFECTATION'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<?php include "../includes/footer.php"; ?>