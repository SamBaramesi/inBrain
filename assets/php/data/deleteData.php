<?php

session_start(); // start session

require_once "../dbconnect.php";

if (!isset($_SESSION['user_id'])) { // Redirect to login page if user is not logged in
    header("location: ../login.php");
    exit;
}



function deleteTables($tableName)
{
    global $vacature_id, $pdo;

    $stmt = $pdo->prepare("DELETE FROM $tableName WHERE vacature_id = :vacature_id");
    $stmt->execute(['vacature_id' => $vacature_id]);

}

if (isset($_GET['id'])) {
    $vacature_id = $_GET['id'];

    if (isset($_POST['confirm'])) {

        $stmt = $pdo->prepare("DELETE FROM vacature WHERE id = :id");
        $stmt->bindParam(':id', $vacature_id);
        $stmt->execute();

        $tableNames = array('banner', 'qualifications', 'benefits', 'activity', 'contact', 'vacancy', 'weekday', 'practicalexample', 'careergrowth', 'growthpath', 'video', 'workwithus', 'workwithusicons');

        foreach ($tableNames as $tableName) {
            deleteTables($tableName);
        }

        // Redirect back to user list page
        header("location: data.php");
        exit;
    }
    
} else {
    echo "VACATURE ID NOT COMING THRU";
}
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
                                <button type="submit" name="confirm" value="confirm" class="btn btn-danger">confirm</button>
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

?>