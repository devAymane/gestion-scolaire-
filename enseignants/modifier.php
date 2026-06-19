<?php
require_once "../config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM enseignant WHERE id_enseignant=?");
$stmt->execute([$id]);

$ens = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['nom'])){

    $sql = "UPDATE enseignant
            SET nom=?,
                prenom=?,
                email=?,
                telephone=?
            WHERE id_enseignant=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['telephone'],
        $id
    ]);

    header("Location:index.php");
}
?>

<form method="POST">

Nom
<input type="text" name="nom" value="<?= $ens['nom'] ?>"><br><br>

Prénom
<input type="text" name="prenom" value="<?= $ens['prenom'] ?>"><br><br>

Email
<input type="email" name="email" value="<?= $ens['email'] ?>"><br><br>

Téléphone
<input type="text" name="telephone" value="<?= $ens['telephone'] ?>"><br><br>

<button type="submit">Modifier</button>

</form>

<?php include "../includes/footer.php"; ?>