<?php
include_once("assets/php/dbconnect.php");

$stmt = $pdo->prepare("SELECT * FROM vacature");
$stmt->execute();
$vacatures = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    .btn {
        background-color: #F26531;
        border-color: #F26531;
    }
</style>

<body>
    <div class="container">
        <h1 class="text-center my-5">Kies Vacature</h1>
        <div class="row">

            <?php foreach ($vacatures as $vacature) : ?>
                <?php
                $vacatureID = $vacature['id'];
                $name = $vacature['name'];
                $img = $vacature['img'];
                $description = $vacature['description'];
                ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" id="vacature-card-<?php echo $vacatureID; ?>">
                        <img class="card-img-top" src="assets/img/<?php echo $img; ?>" alt="<?php echo $name; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text"><?php echo $description ?></p>
                            <a href="vacature.php?id=<?php echo $vacatureID ?>" class="btn btn-info">Soliciteren</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>