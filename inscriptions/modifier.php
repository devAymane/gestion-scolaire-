<?php

require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
"SELECT * FROM inscrire
WHERE id_inscrire=?"
);

$stmt->execute([$id]);

$inscription = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['date_inscription'])){

    $stmt = $pdo->prepare(
    "UPDATE inscrire
     SET date_inscription=?
     WHERE id_inscrire=?"
    );

    $stmt->execute([
        $_POST['date_inscription'],
        $id
    ]);

    header("Location:index.php");
}
?>

<form method="POST">

Date inscription :

<input type="date"
name="date_inscription"
value="<?= $inscription['date_inscription'] ?>">

<br><br>

<button type="submit">
Modifier
</button>

</form>


<?php include "../includes/footer.php"; ?>