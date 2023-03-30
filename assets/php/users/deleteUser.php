<?php

session_start(); // start session

require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";

if (!isset($_SESSION['user_id'])) { // Redirect to login page if user is not logged in
    header("location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // check if confirmation is received
    if (isset($_POST['confirm'])) {

        // Prepare a DELETE statement to remove the user with the given ID
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);

        // Redirect back to user list page
        header("location: users.php");
        exit;
    } else {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Delete User</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>

        <body>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Delete User</div>
                            <div class="card-body">
                                <p>Are you sure you want to delete this user?</p>
                                <form method="post">
                                    <div class="form-group">
                                        <button type="submit" name="confirm" class="btn btn-danger">Delete</button>
                                        <a href="users.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>

        </html>
<?php
    }
} else {
    echo "something went wrong";
}

?>