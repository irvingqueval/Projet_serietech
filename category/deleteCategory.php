<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID de la catégorie à supprimer
    $category_id = $_POST['category_id'];

    // Supprimer la catégorie de la table category
    $query = "DELETE FROM category WHERE id = :category_id";
    $stm = $pdo->prepare($query);
    $stm->bindValue(":category_id", $category_id, PDO::PARAM_INT);
    $stm->execute();

    // Rediriger vers une page de succès ou la liste des catégories
    header("Location: deleteCategorySuccess.php");
    exit;
} else {
    echo "HTTP method error: POST method required.";
}
?>
