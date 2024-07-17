<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Vérifier que l'ID est présent
    if (!$id) {
        echo "Aucun ID spécifié.";
        exit;
    }

    // Requête pour supprimer la série
    $query = "DELETE FROM serie WHERE id = :id";
    $stm = $pdo->prepare($query);
    $stm->bindValue(":id", $id, PDO::PARAM_INT);

    // Exécuter la requête SQL
    if ($stm->execute()) {
        // Rediriger vers la page d'index après la suppression
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de la série.";
    }
} else {
    echo "Requête invalide.";
}
?>
