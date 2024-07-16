<?php
require_once "_connect.php";
$pdo = new \PDO(DSN, USER);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
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
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>