<?php
include "../header.php";

// Requête pour récupérer toutes les catégories
$query = "SELECT * FROM category";
$stm = $pdo->query($query);
$categories = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-5">
    <h2>Update Category</h2>
    <form action="updateCategoryHandler.php" method="post">
        <div class="mb-3">
            <label for="category" class="form-label">Select Category</label>
            <select class="form-select" id="category" name="id" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Category name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
