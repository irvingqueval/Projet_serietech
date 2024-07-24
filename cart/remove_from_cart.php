<?php
require_once "../_connect.php";
$pdo = new \PDO(DSN, USER);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../authentification/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['serie_id'])) {
        $serie_id = $_POST['serie_id'];

        $query = "DELETE FROM cart WHERE user_id = :user_id AND serie_id = :serie_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':serie_id', $serie_id);
        $stmt->execute();
    }
}

header("Location: view_cart.php");
exit();
