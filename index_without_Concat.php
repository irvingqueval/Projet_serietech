<?php
include "header.php";

$query = "
    SELECT s.id, s.name, s.numberOfSeasons, s.synopsis, s.image_url, c.nom AS category_name
    FROM serie s
    JOIN serie_category sc ON s.id = sc.serie_ID
    JOIN category c ON sc.cat_ID = c.id
";
$statement = $pdo->query($query);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$series = [];
foreach ($results as $row) {
    $serieId = $row['id'];
    if (!isset($series[$serieId])) {
        $series[$serieId] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'numberOfSeasons' => $row['numberOfSeasons'],
            'synopsis' => $row['synopsis'],
            'image_url' => $row['image_url'],
            'category_names' => []
        ];
    }
    $series[$serieId]['category_names'][] = $row['category_name'];
}

foreach ($series as $serieId => $serie) {
    $series[$serieId]['category_names'] = implode(', ', $serie['category_names']);
}

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
        </div>
      </div>
    </div>
  </div>
<?php
}

