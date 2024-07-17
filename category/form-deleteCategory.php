<?php
include "../header.php";

// Requête pour récupérer les catégories
$query = "SELECT * FROM category";
$statement = $pdo->query($query);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Delete a category</h2>
    <form action="deleteCategory.php" method="post">
        <div class="mb-3">
            <label for="category_id" class="form-label">Select a category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?=$category['id']?>"><?=$category['nom']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
