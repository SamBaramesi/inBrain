<?php

session_start(); // start session

require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";

if (!isset($_SESSION['user_id'])) { // Redirect to login page if user is not logged in
    header("location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $vacature_id = $_GET['id'];

    // check if confirmation is received
    if (isset($_POST['confirm'])) {

        // Prepare a DELETE statement to remove the vacancy with the given ID
        $stmt = $pdo->prepare("DELETE FROM vacature WHERE id = :id");
        $stmt->bindParam(":id", $vacature_id);
        $stmt->execute();

        // // DELETE banner table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM banner WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE qualifications table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM qualifications WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE benefits table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM benefits WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE activity table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM activity WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE contact table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM contact WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE vacancy table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM vacancy WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE workweek table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM weekday WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE practicalExample table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM practicalexample WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE careerGrowth table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM careergrowth WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE growthPath table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM growthpath WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE Video table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM video WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE workWithUs table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM workwithus WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // // DELETE workWithUsIcons table WHERE id = $vacatureID
        // $stmt = $pdo->prepare("DELETE FROM workwithusicons WHERE vacature_id = $vacature_id");
        // $stmt->execute();

        // Redirect back to user list page
        header("location: data.php");
        exit;
    } else {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Delete Vacancy</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>

        <body>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Delete Vacancy</div>
                            <div class="card-body">
                                <p>Are you sure you want to delete this Vacancy?</p>
                                <form method="post">
                                    <div class="form-group">
                                        <button type="submit" name="confirm" class="btn btn-danger">Delete</button>
                                        <a href="data.php" class="btn btn-secondary">Cancel</a>
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