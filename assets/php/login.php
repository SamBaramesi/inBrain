<?php

session_start(); // start session

require_once "dbconnect.php";

if(isset($_POST["submit"])){

    $username = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    // Prepare a SELECT statement to retrieve the user with the matching username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        // If the user exists and the entered password matches the stored hash
        $_SESSION["user_id"] = $user["id"]; // Store user ID in session
        $_SESSION["user_name"] = $user["name"]; // Store user Name in session
        header("location: index.php"); // Redirect to home page
        exit;
    } else {
        $error = "Incorrect username or password!"; // Set error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f1f1f1;
        }

        .login-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 login-container">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">Login</h3>
                        <?php if (isset($error)) {echo $error;} ?>
                        <!-- Login Form -->
                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </form>
                        <!-- End of Login Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>