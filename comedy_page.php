<?php
include "header.php";

$id = 1;

// Requête pour récupérer les informations de la catégorie
$query = "SELECT * FROM category WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->execute([':id' => $id]);
$category = $statement->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    echo "Catégorie non trouvée.";
    exit;
}

// Requête pour récupérer toutes les séries de la catégorie spécifiée
$query = "
    SELECT serie.*
    FROM serie
    JOIN serie_category ON serie.id = serie_category.serie_ID
    WHERE serie_category.cat_ID = :category_id
";
$statement = $pdo->prepare($query);
$statement->execute([':category_id' => $id]);
$series = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-5">
    <h2>Series in category : <?= htmlspecialchars($category['nom']) ?></h2>
    <?php if (count($series) > 0) : ?>
        <?php foreach ($series as $serie) : ?>
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="<?= $serie['image_url'] ?>" class="img-fluid rounded-start" alt="Affiche de <?= $serie['name'] ?>" style="width:250px; height:300px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 30px;">
                                <?= htmlspecialchars($serie['name']) ?>
                            </h5>
                            <p class="card-text"><?= htmlspecialchars($serie['synopsis']) ?></p>
                            <button type="button" class="btn btn-outline-danger">
                                <a href="/serie/confirmDelete.php?id=<?= $serie['id'] ?>">Delete</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No series found in this category.</p>
    <?php endif; ?>
</div>