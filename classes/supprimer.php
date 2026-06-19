<?php
require_once "../config.php";

if(isset($_GET['id'])){

    try{

        $stmt = $pdo->prepare(
            "DELETE FROM classe
             WHERE id_classe=?"
        );

        $stmt->execute([$_GET['id']]);

    }catch(PDOException $e){

        echo "Impossible de supprimer cette classe car elle contient des inscriptions.";
        exit;
    }
}

header("Location:index.php");
exit;