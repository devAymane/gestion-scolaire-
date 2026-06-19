<?php

require_once "../cnx.php";

if(isset($_POST['nom_matiere'])){

    $nom = $_POST['nom_matiere'];

    $stmt = $pdo->prepare(
    "INSERT INTO matiere(nom_matiere)
     VALUES(?)"
    );

    $stmt->execute([$nom]);

    header("Location:index.php");
}
?>

<form method="POST">

Nom Matière :

<input type="text" name="nom_matiere">

<br><br>

<button type="submit">
Ajouter
</button>

</form>