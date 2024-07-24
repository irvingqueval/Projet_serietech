<?php
include '../header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../authentification/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to fetch cart items
$query = "SELECT serie.id, serie.name, serie.image_url 
          FROM cart 
          JOIN serie ON cart.serie_id = serie.id 
          WHERE cart.user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <title>Your Cart</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>
        <?php if (empty($cart_items)): ?>
            <div class="alert alert-info" role="alert">
                Your cart is empty. <a href="../index.php" class="alert-link">Continue shopping</a>.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($cart_items as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                <form action="remove_from_cart.php" method="post">
                                    <input type="hidden" name="serie_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                                    <button type="submit" class="btn btn-danger">Remove from cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <a href="../index.php" class="btn btn-primary mt-4">Continue shopping</a>
    </div>
</body>
</html>
