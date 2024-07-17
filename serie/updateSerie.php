<?php
include "../header.php";

$id = $_GET['id'];

if (!$id) {
    echo "No ID specified.";
    exit;
}

// Requête pour récupérer les informations de la série
$query = "SELECT * FROM serie WHERE id = :id";
$stm = $pdo->prepare($query);
$stm->bindValue(":id", $id, PDO::PARAM_INT);
$stm->execute();
$serie = $stm->fetch(PDO::FETCH_ASSOC);

if (!$serie) {
    echo "Series not found.";
    exit;
}

// Requête pour récupérer les catégories
$query = "SELECT * FROM category";
$statement = $pdo->query($query);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les catégories associées à la série
$query = "SELECT cat_ID FROM serie_category WHERE serie_ID = :id";
$stm = $pdo->prepare($query);
$stm->bindValue(":id", $id, PDO::PARAM_INT);
$stm->execute([':id' => $id]);
$serieCategories = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
?>

<div class="container mt-5">
    <h2>Update series</h2>
    <form action="updateSerieHandler.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Series name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($serie['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="numberOfSeasons" class="form-label">Number of seasons</label>
            <input type="number" class="form-control" id="number_of_seasons" name="numberOfSeasons" value="<?= htmlspecialchars($serie['numberOfSeasons']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required><?= htmlspecialchars($serie['synopsis']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Categories</label><br>
            <?php foreach ($categories as $category) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="category<?= htmlspecialchars($category['id']) ?>" name="categories[]" value="<?= htmlspecialchars($category['id']) ?>" <?= in_array($category['id'], $serieCategories) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="category<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['nom']) ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Series poster</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
