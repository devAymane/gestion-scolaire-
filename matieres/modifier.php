<?php

require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
"SELECT * FROM matiere
WHERE id_matiere=?"
);

$stmt->execute([$id]);

$matiere = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['nom_matiere'])){

    $stmt = $pdo->prepare(
    "UPDATE matiere
     SET nom_matiere=?
     WHERE id_matiere=?"
    );

    $stmt->execute([
        $_POST['nom_matiere'],
        $id
    ]);

    header("Location:index.php");
}
?>

<form method="POST">

<input type="text"
name="nom_matiere"
value="<?= $matiere['nom_matiere'] ?>">

<button type="submit">
Modifier
</button>

</form>


<?php include "../includes/footer.php"; ?>