<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $numberOfSeasons = $_POST['numberOfSeasons'];
    $synopsis = $_POST['synopsis'];
    $categories = $_POST['categories'] ?? [];
    
    // Vérifier que les champs obligatoires sont présents
    if (!$id || !$name || !$numberOfSeasons || !$synopsis) {
        header("Location: updateConfirmation.php?status=error");
        exit;
    }
    
    // Requête pour mettre à jour la série
    $query = "UPDATE serie SET name = :name, numberOfSeasons = :numberOfSeasons, synopsis = :synopsis WHERE id = :id";
    $stm = $pdo->prepare($query);
    $stm->bindValue(":name", $name, PDO::PARAM_STR);
    $stm->bindValue(":numberOfSeasons", $numberOfSeasons, PDO::PARAM_INT);
    $stm->bindValue(":synopsis", $synopsis, PDO::PARAM_STR);
    $stm->bindValue(":id", $id, PDO::PARAM_INT);
    
    // Exécuter la requête SQL
    if ($stm->execute()) {
        // Mise à jour des catégories
        $query = "DELETE FROM serie_category WHERE serie_ID = :id";
        $stm = $pdo->prepare($query);
        $stm->bindValue(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        
        foreach ($categories as $category_id) {
            $query = "INSERT INTO serie_category (serie_ID, cat_ID) VALUES (:serie_ID, :cat_ID)";
            $stm = $pdo->prepare($query);
            $stm->bindValue(":serie_ID", $id, PDO::PARAM_INT);
            $stm->bindValue(":cat_ID", $category_id, PDO::PARAM_INT);
            $stm->execute();
        }
        
        // Gérer l'upload de l'image
        if ($_FILES['image']['name']) {
            $target_dir = "/Users/irving/Desktop/Projet_serietech/image/";
            $image_name = basename($_FILES['image']['name']);
            $target_file = $target_dir . $image_name;
            $relative_path = "/image/" . $image_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $query = "UPDATE serie SET image_url = :image_url WHERE id = :id";
                $stm = $pdo->prepare($query);
                $stm->bindValue(":image_url", $relative_path, PDO::PARAM_STR);
                $stm->bindValue(":id", $id, PDO::PARAM_INT);
                $stm->execute();
            } else {
                header("Location: updateConfirmation.php?status=error");
                exit;
            }
        }
        
        // Rediriger vers la page de confirmation avec succès
        header("Location: updateConfirmation.php?status=success");
        exit;
    } else {
        // Rediriger vers la page de confirmation avec erreur
        header("Location: updateConfirmation.php?status=error");
        exit;
    }
} else {
    echo "Requête invalide.";
}
?>
