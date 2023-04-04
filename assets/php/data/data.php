<?php
	session_start(); // start session

    require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";
    
    // Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM vacature");

$vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Users</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Data</h1>
        <a href="addData.php" class="btn btn-primary mb-4">Add Vacancy</a>
        <a href="../index.php" class="btn btn-secondary mb-4">Back to Home</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Vacancy ID</th>
                    <th scope="col">Vacancy Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vacancies as $vacancy) : ?>
                    <tr>
                        <th scope="row"><?php echo $vacancy["id"]; ?></th>
                        <td><?php echo $vacancy["name"]; ?></td>
                        <td>
                            <a type="submit" href="deleteData.php?id=<?php echo $vacancy["id"]; ?>" class="btn btn-danger">Delete</a>
                            <a type="submit" href="editData.php?id=<?php echo $vacancy["id"]; ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>