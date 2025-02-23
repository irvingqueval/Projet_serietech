<?php
require_once "_connect.php";
$pdo = new \PDO(DSN, USER);

$search = '';
$results = [];
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $stmt = $pdo->prepare("SELECT s.id, s.name, s.numberOfSeasons, s.synopsis, s.image_url, GROUP_CONCAT(c.nom SEPARATOR ', ') AS category_names
    FROM serie s
    JOIN serie_category sc ON s.id = sc.serie_ID
    JOIN category c ON sc.cat_ID = c.id
    WHERE name LIKE :search
    GROUP BY s.id, s.name, s.synopsis, s.image_url
    ORDER BY s.name");
  $stmt->execute(['search' => '%' . $search . '%']);
  $results = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Série tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
        <a class="navbar-brand" href="../index.php">Series Tech</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/comedy_page.php">comedy</a></li>
              <li><a class="dropdown-item" href="/dramatic_page.php">dramatic</a></li>
              <li><a class="dropdown-item" href="/police_officer_page.php">police officer</a></li>
              <li><a class="dropdown-item" href="/judicial_page.php">judicial</a></li>
              <li><a class="dropdown-item" href="/medical_page.php">medical</a></li>
              <li><a class="dropdown-item" href="/policy_page.php">policy</a></li>
              <li><a class="dropdown-item" href="/action_adventure_page.php">action/adventure</a></li>
              <li><a class="dropdown-item" href="/fantasy_science_fiction_page.php">fantasy and science fiction</a></li>
              <li><a class="dropdown-item" href="/sports_series_page.php">sports series</a></li>
              <li><a class="dropdown-item" href="/historical_series_page.php">historical series</a></li>
              <li><a class="dropdown-item" href="/yourth_page.php">yourth</a></li>
              <li><a class="dropdown-item" href="/horror_page.php">horror</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/serie/form-addSerie.php">Add a series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/category/form-addCategory.php">Add a category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/category/form-deleteCategory.php">Delete a category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/category/updateCategory.php">Update a category</a>
          </li>
        </ul>
        <form class="d-flex" role="search" method="GET" action="">
          <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search" value="<?php echo htmlspecialchars($search); ?>">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a class="nav-link" href="/cart/view_cart.php">
          <img src="/logo/shopping-cart.webp" style="width: 40px; height: 40px;">
        </a>
        <?php if (isset($_SESSION["user"])) { ?>
          <p><?php echo $_SESSION["user"]["email"]; ?></p>
          <a class="nav-link" href="/authentification/logout.php">
            <img src="/logo/Logout.webp" alt="Logout" style="width: 40px; height: 40px;">
          </a>
        <?php } else { ?>
          <a class="nav-link" href="/authentification/login.php">
            <img src="/logo/connexion.webp" alt="Login" style="width: 40px; height: 40px;">
          </a>
        <?php } ?>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <?php if (!empty($results)) : ?>
      <h2>Search results for "<?php echo htmlspecialchars($search); ?>"</h2>
      <ul class="list-group">
        <?php foreach ($results as $serie) : ?>
          <li class="list-group-item">
            <div class="d-flex justify-content-center">
              <a href="serieDetail.php?id=<?= $serie['id'] ?>">
                <img src="<?= $serie['image_url'] ?>" class="img-fluid rounded-start" alt="..." style="width:250px; height:300px;">
              </a>
            </div>
            <h5 class="card-title" style="font-size: 30px;">
              <a href="serieDetail.php?id=<?= $serie['id'] ?>"><?= $serie['name'] ?></a> - <span style="font-size: 20px;"><?= $serie['category_names'] ?></span>
            </h5>
            <p><?php echo htmlspecialchars($serie['synopsis']); ?></p>
            <div class="d-flex justify-content-around">
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
          </li>
        <?php endforeach; ?>
      </ul>
    <?php elseif ($search) : ?>
      <p>No results found for "<?php echo htmlspecialchars($search); ?>"</p>
    <?php endif; ?>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>