<?php

require_once "../cnx.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
"DELETE FROM enseignant
 WHERE id_enseignant=?"
);

$stmt->execute([$id]);

header("Location:index.php");