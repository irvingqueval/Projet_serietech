<?php
include "../header.php";

// Requête pour récupérer les catégories
$query = "SELECT * FROM category";
$statement = $pdo->query($query);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Add a new series</h2>
    <form action="addSerie.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Series name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="numberOfSeasons" class="form-label">Number of seasons</label>
            <input type="number" class="form-control" id="number_of_seasons" name="numberOfSeasons" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Categories</label><br>
            <?php foreach ($categories as $category) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="category<?=$category['id']?>" name="categories[]" value="<?=$category['id']?>">
                    <label class="form-check-label" for="category<?=$category['id']?>"><?=$category['nom']?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Series poster</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>