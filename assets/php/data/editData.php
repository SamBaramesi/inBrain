<?php

// session_start(); // start session

// require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";

// if (!isset($_SESSION['user_id'])) { // Redirect to login page if user is not logged in
//     header("location: ../login.php");
//     exit;
// }

// if (isset($_POST['submit'])) {

//     $user_id = $_POST['id'];
//     $name = $_POST['name'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // Update user details in the database
//     $stmt = $pdo->prepare("UPDATE users SET name = :name, username = :username, password = :password WHERE id = $user_id");
//     $stmt->execute(['name' => $name, 'username' => $username, 'password' => $hashed_password]);

//     // Redirect back to user list page
//     header("location: users.php");
//     exit;

// } elseif (isset($_GET['id'])) {

//     $user_id = $_GET['id'];

//     // Retrieve user details from the database
//     $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
//     $stmt->execute([$user_id]);
//     $user = $stmt->fetch();

// } else {
//     echo "something went wrong";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Users</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<style>
    .tooltip-inner img {
        max-width: 500px;
        max-height: 500px;
        position: absolute;
    }
</style>

<body>
    
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Banner</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editUser.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-2">
                <label for="Function Name" class="form-label">Function Name</label>
                <input type="text" class="form-control" id="Function Name" name="Function Name" required>
            </div>
            <div class="mb-2">
                <label for="company name" class="form-label">company name</label>
                <input type="text" class="form-control" id="company name" name="company name" required>
            </div>
            <div class="mb-2">
                <label for="company location" class="form-label">company location</label>
                <input type="text" class="form-control" id="company location" name="company location" required>
            </div>
            <div class="mb-2">
                <label for="Button Text" class="form-label">Button Text</label>
                <input type="text" class="form-control" id="Button Text" name="Button Text" required>
            </div>
        </form>
    </div>

    <!-- ------------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------------ -->

    <hr class="mt-5">
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Qualifications</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editUser.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-2">
                <label for="Opleiding Niveau" class="form-label">Opleiding Niveau</label>
                <input type="text" class="form-control" id="Opleiding Niveau" name="Opleiding Niveau" required>
            </div>
            <div class="mb-2">
                <label for="Werk Ervaring" class="form-label">Werk Ervaring</label>
                <input type="text" class="form-control" id="Werk Ervaring" name="Werk Ervaring" required>
            </div>
            <div class="mb-2">
                <label for="Vaardigheden" class="form-label">Vaardigheden</label>
                <input type="text" class="form-control" id="Vaardigheden" name="Vaardigheden" required>
            </div>
            <div class="mb-2">
                <label for="Vaardigheden" class="form-label">Vaardigheden</label>
                <input type="text" class="form-control" id="Vaardigheden" name="Vaardigheden" required>
            </div>
            <div class="mb-2">
                <label for="Taal Niveau" class="form-label">Taal Niveau</label>
                <input type="text" class="form-control" id="Taal Niveau" name="Taal Niveau" required>
            </div>
            <div class="mb-2">
                <label for="Persoonlijke houding" class="form-label">Persoonlijke houding</label>
                <input type="text" class="form-control" id="Persoonlijke houding" name="Persoonlijke houding" required>
            </div>
        </form>
    </div>
    
    </form>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body',
                boundary: '.toolTipContainer',
                html: true,
                placement: 'bottom'
            });
        });
    </script>
</body>

</html>

<?php
$stmt = $db->query("SELECT header,companyName,companyLocation,button from banner where vacature_id={$vacatureID}");
$bannerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$banner = array();
foreach ($bannerData as $bannerRow) {
    foreach ($bannerRow as $bannerKey => $bannerValue) {
        $banner[] = array("id" => count($banner) + 1, "objectName" => $bannerKey, "objectValue" => $bannerValue);
    }
}
?>
<!--  -->
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