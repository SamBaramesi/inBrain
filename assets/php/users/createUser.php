<?php
require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php"; // Include database connection file

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Sanitize user input to prevent SQL Injection attacks
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an INSERT statement to add a new user to the database
    $stmt = $pdo->prepare("INSERT INTO users ( username, password) VALUES (?, ?)");
    $stmt->execute([$email, $hashed_password]);

    // Redirect to the home page after successfully adding the user to the database
    header("location: ./index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Create User</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Create User</h1>
        <hr>
        <form action="createUser.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create User</button>
            <button href="/assets/php/index.php" class="btn btn-secondary">Back To Dashboard</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>