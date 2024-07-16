<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $numberOfSeasons = $_POST['numberOfSeasons'];
    $synopsis = $_POST['synopsis'];
    $categories = $_POST['categories'];
    $image = $_FILES['image'];

    // Gérer l'upload de l'image
    // Définir le répertoire cible pour le stockage de l'image
    $target_dir = "/Users/irving/Desktop/Projet_serietech/image/";
    $image_name = basename($image["name"]);
    $target_file = $target_dir . $image_name;
    $relative_path = "/image/" . $image_name;

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Insérer la nouvelle série dans la table serie
        $query = "INSERT INTO serie (name, numberOfSeasons, synopsis, image_url) VALUES (:name, :numberOfSeasons, :synopsis, :image_url)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            ':name' => $name,
            ':numberOfSeasons' => $numberOfSeasons,
            ':synopsis' => $synopsis,
            ':image_url' => $relative_path
        ]);

        // Récupérer l'ID de la série nouvellement insérée
        $serie_id = $pdo->lastInsertId();

        // Insérer les catégories dans la table de jointure serie_category
        foreach ($categories as $category_id) {
            $query = "INSERT INTO serie_category (serie_ID, cat_ID) VALUES (:serie_id, :category_id)";
            $statement = $pdo->prepare($query);
            $statement->execute([
                ':serie_id' => $serie_id,
                ':category_id' => $category_id
            ]);
        }

        // Rediriger vers une page de succès ou la liste des séries
        header("Location: success.php");
        exit;
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de l'image.";
    }
}