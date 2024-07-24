<?php
include "header.php";

// Requête SQL pour joindre les tables serie, serie_category, et category
$query = "
    SELECT s.id, s.name, s.numberOfSeasons, s.synopsis, s.image_url, GROUP_CONCAT(c.nom SEPARATOR ', ') AS category_names
    FROM serie s
    JOIN serie_category sc ON s.id = sc.serie_ID
    JOIN category c ON sc.cat_ID = c.id
    GROUP BY s.id, s.name, s.synopsis, s.image_url
    ORDER BY s.name
";
$statement = $pdo->query($query);
$series = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($series as $serie) {
?>
  <div class="card mb-3" style="max-width: 100%;">
    <div class="row g-0">
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <a href="serieDetail.php?id=<?= $serie['id'] ?>">
          <img src="<?= $serie['image_url'] ?>" class="img-fluid rounded-start" alt="..." style="width:250px; height:300px;">
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title" style="font-size: 30px;">
            <a href="serieDetail.php?id=<?= $serie['id'] ?>"><?= $serie['name'] ?></a> - <span style="font-size: 20px;"><?= $serie['category_names'] ?></span>
          </h5>
          <p>Number of seasons : <?= $serie['numberOfSeasons'] ?></p>
          <p class="card-text"><?= $serie['synopsis'] ?></p>
          <button type="button" class="btn btn-outline-danger">
            <a href="/serie/confirmDelete.php?id=<?= $serie['id'] ?>">Delete</a>
          </button>
          <button type="button" class="btn btn-outline-warning">
            <a href="/serie/updateSerie.php?id=<?= $serie['id'] ?>">Update</a>
          </button>
          <form action="/cart/add_to_cart.php" method="post">
            <input type="hidden" name="serie_id" value="<?php echo $serie['id']; ?>">
            <button type="submit" class="btn btn-outline-success">Add to cart</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}