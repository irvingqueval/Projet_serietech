<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    
    // Vérifier que les champs obligatoires sont présents
    if (!$id || !$name) {
        header("Location: updateConfirmation.php?status=error");
        exit;
    }
    
    // Requête pour mettre à jour la catégorie
    $query = "UPDATE category SET nom = :name WHERE id = :id";
    $stm = $pdo->prepare($query);
    $stm->bindValue(":name", $name, PDO::PARAM_STR);
    $stm->bindValue(":id", $id, PDO::PARAM_INT);
    
    // Exécuter la requête SQL
    if ($stm->execute()) {
        // Rediriger vers la page de confirmation avec succès
        header("Location: updateCategorySuccess.php");
        exit;
    } else {
        // Rediriger vers la page de confirmation avec erreur
        echo "HTTP method error: POST method required.";
        exit;
    }
} else {
    echo "Invalid request.";
}
?>
