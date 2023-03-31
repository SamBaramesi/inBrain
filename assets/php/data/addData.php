<?php

session_start(); // start session

require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php"; // Include database connection file

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Sanitize input to prevent SQL Injection attacks
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);

    // Prepare an INSERT statement to add a new vacancy to the database
    $stmt = $pdo->prepare("INSERT INTO vacature (name) VALUES (?)");
    $stmt->execute([$name]);

    // Redirect to the home page after successfully adding the user to the database
    header("location: data.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Create Vacancy</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Create Vacancy</h1>
        <hr>
        <form action="addData.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Vacancy</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>