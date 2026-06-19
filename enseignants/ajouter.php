<?php
require_once "../cnx.php";

if(isset($_POST['nom'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO enseignant
    (nom,prenom,email,telephone)
    VALUES (?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom,$prenom,$email,$telephone]);

    header("Location:index.php");
}
?>

<form method="POST">
    Nom <input type="text" name="nom"><br><br>
    Prénom <input type="text" name="prenom"><br><br>
    Email <input type="email" name="email"><br><br>
    Téléphone <input type="text" name="telephone"><br><br>

    <button type="submit">Ajouter</button>
</form>