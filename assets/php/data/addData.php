<?php

// Start the session
session_start();

// Include database connection file
require_once "../dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL Injection attacks
    $name = filter_var(trim($_POST["name"]));
    $img = filter_var(trim($_POST["img"]));
    $description = filter_var(trim($_POST["description"]));

    // Prepare an INSERT statement to add a new vacancy to the database
    $stmt = $pdo->prepare("INSERT INTO vacature (name,img,description) VALUES (?,?,?)");
    $stmt->execute([$name, $img, $description]);

    // get the last inserted id and save it in a variable
    $vacature_id = $pdo->lastInsertId();

    // Make Function createVacancyRow
    function createVacancyRow($table)
    {
        global $pdo, $vacature_id;

        $stmt = $pdo->prepare("INSERT INTO $table (`vacature_id`) VALUES (?)");
        $stmt->execute([$vacature_id]);
    }

    $tables = array('banner', 'qualifications', 'benefits', 'activity', 'contact', 'vacancy', 'weekday', 'practicalExample', 'careerGrowth', 'growthPath', 'Video', 'workWithUs', 'workWithUsIcons',);

    foreach ($tables as $table) {
        createVacancyRow($table);
    }

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
            <div class="mb-3">
                <label for="img" class="form-label">img</label>
                <input type="img" placeholder="img.png" class="form-control" id="img" name="img" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="description" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Vacancy</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>