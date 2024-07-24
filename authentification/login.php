<?php
include "../header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: /index.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

$accountCreated = false;
if (isset($_SESSION['account_created']) && $_SESSION['account_created']) {
    $accountCreated = true;
    unset($_SESSION['account_created']);
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5">Connection</h2>
            <?php if ($accountCreated): ?>
                <div class="alert alert-success" role="alert">
                    Account created successfully. You can now log in.
                </div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <form method="post" action="/authentification/login.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="/authentification/register.php" class="btn btn-secondary">Create an account</a>
            </form>
        </div>
    </div>
</div>