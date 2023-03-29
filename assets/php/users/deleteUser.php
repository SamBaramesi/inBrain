<?php

session_start(); // start session

if(!isset($_SESSION['user_id'])){ // Redirect to login page if user is not logged in
    header("location: ../login.php");
    exit;
}

if(isset($_POST['delete'])){ // If form is submitted with "delete" button

    $user_id = $_POST['user_id'];

    // Prepare a DELETE statement to remove the user with the given ID
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);

    // Redirect back to user list page
    header("location: users.php");
    exit;
} else {
    echo "something went wrong";
}
?>