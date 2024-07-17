<?php
include "../header.php";
?>

<div class="container">
    <h2>Add a new category</h2>
    <form action="addCategory.php" method="post">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
