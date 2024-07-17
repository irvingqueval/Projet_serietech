<?php
include "../header.php";
?>

<div class="container mt-5">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success" role="alert">
            The update has been successfully completed!
        </div>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            An error occurred during the update.
        </div>
    <?php endif; ?>
    <a href="../index.php" class="btn btn-primary">Back to home</a>
</div>