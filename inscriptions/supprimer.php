<?php

require_once "../cnx.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
"DELETE FROM inscrire
WHERE id_inscrire=?"
);

$stmt->execute([$id]);

header("Location:index.php");