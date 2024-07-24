<?php
require_once "../_connect.php";
$pdo = new \PDO(DSN, USER);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../authentification/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$serie_id = $_POST['serie_id'];

// Insert the item into the cart
$query = "INSERT INTO cart (user_id, serie_id) 
          VALUES (:user_id, :serie_id)
          ON DUPLICATE KEY UPDATE serie_id = VALUES(serie_id)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':serie_id', $serie_id);
$stmt->execute();

// Redirect to view cart page
header("Location: view_cart.php");
exit();
