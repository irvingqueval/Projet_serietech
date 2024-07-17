<?php
include "../header.php";

$id = $_GET['id'];

if (!$id) {
    echo "Aucun ID spécifié.";
    exit;
}

// Afficher un message de confirmation de suppression avec un formulaire
?>

<div class="container mt-5">
    <h2>Confirm delete</h2>
    <p>Are you sure you want to delete this series? This action is irreversible.</p>
    <form id="deleteForm" action="deleteSerie.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <button type="button" class="btn btn-danger" onclick="confirmDeletion()">Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function confirmDeletion() {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette série ?")) {
        document.getElementById("deleteForm").submit();
    }
}
</script>
