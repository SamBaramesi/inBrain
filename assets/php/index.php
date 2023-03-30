<?php
	session_start(); // start session
	$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<style>

.card {
    height: 40vh;
}

.card img {
    height: 100%;
    width: 100%;
}

#user_img {
	object-fit: scale-down;
}

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h3>Welcome to the Admin Dashboard <?php echo $user_name; ?></h3>
        <p>This is where you can manage users and data.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 100%;">
                    <img src="../img/user.png" class="card-img-top" id="user_img" alt="Admin Users Image">
                    <div class="card-body">
                        <h5 class="card-title">Admin Users</h5>
                        <p class="card-text">Manage admin users here.</p>
                        <a href="users/users.php" class="btn btn-primary">Go to Admin Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%;">
                    <img src="../img/data.jpg" class="card-img-top" alt="Manage Data Image">
                    <div class="card-body">
                        <h5 class="card-title">Manage Data</h5>
                        <p class="card-text">Manage data here.</p>
                        <a href="data/data.php" class="btn btn-primary">Go to Manage Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
