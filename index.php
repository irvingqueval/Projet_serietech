<?php
include "header.php";

$query = "SELECT * FROM serie";
$statement = $pdo->query($query);
$series = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($series as $serie){
    ?>
    <div class="card mb-3" style="max-width: 100;">
  <div class="row g-0">
    <div class="col-md-4">
        <img src="<?=$serie["image_url"] ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 30px;"><?=$serie["name"]?></h5>
        <p class="card-text"><?=$serie["synopsis"]?></p>
        <button type="button" class="btn btn-outline-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
    <?php
}