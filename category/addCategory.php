<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $category_name = $_POST['category_name'];

    // Insérer la nouvelle catégorie dans la table category
    $query = "INSERT INTO category (nom) VALUES (:category_name)";
    $stm = $pdo->prepare($query);
    $stm->bindValue(":category_name", $category_name, PDO::PARAM_STR);
    $stm->execute();

    // Rediriger vers une page de succès ou la liste des catégories
    header("Location: addCategorySuccess.php");
    exit;
} else {
    echo "HTTP method error: POST method required.";
}
?>
