<?php
session_start(); // start session

require_once "../dbconnect.php";

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
    exit;
}

// Retrieve all admin users from the users table
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <h1 class="mb-4">Admin Users</h1>
        <a href="createUser.php" class="btn btn-primary mb-4">Add New User</a>
        <a href="../index.php" class="btn btn-secondary mb-4">Back to Home</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?php echo $user["id"]; ?></th>
                        <td><?php echo $user["name"]; ?></td>
                        <td><?php echo $user["username"]; ?></td>
                        <td>
                            <a type="submit" href="deleteUser.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger">Delete</a>
                            <a type="submit" href="editUser.php?id=<?php echo $user["id"]; ?>" class="btn btn-primary">Edit</a>
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