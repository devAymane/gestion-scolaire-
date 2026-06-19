<?php
require_once "../config.php";

if(isset($_GET['id'])){

    $stmt = $pdo->prepare(
        "DELETE FROM affectation
         WHERE id_AFFECTATION=?"
    );

    $stmt->execute([$_GET['id']]);
}

header("Location:index.php");
exit;