<?php

// Start the session
session_start();

// Include database connection file
require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Sanitize input to prevent SQL Injection attacks
    $name = filter_var(trim($_POST["name"]));
    $img = filter_var(trim($_POST["img"]));
    $description = filter_var(trim($_POST["description"]));

    // Prepare an INSERT statement to add a new vacancy to the database
    $stmt = $pdo->prepare("INSERT INTO vacature (name,img,description) VALUES (?,?,?)");
    $stmt->execute([$name, $img, $description]);
    
    // get the last inserted id and save it in a variable
    $vacature_id = $pdo->lastInsertId();

    // // Save the vacature_id value in a session variable
    // $_SESSION['vacature_id'] = $vacatureId;
    
    // duplicate banner table
    $stmt = $pdo->prepare("INSERT INTO banner (`vacature_id`,`header`,`companyName`,`companyLocation`,`button`) SELECT $vacature_id,`header`,`companyName`,`companyLocation`,`button` FROM banner WHERE id = id");
    $stmt->execute();

    // // duplicate qualifications table
    // $stmt = $pdo->prepare("INSERT INTO qualifications (`vacature_id`,`icon`,`icon_class`,`icon_text`) SELECT $vacature_id, `icon`,`icon_class`,`icon_text` FROM qualifications WHERE id = id");
    // $stmt->execute();

    // // duplicate benefits table
    // $stmt = $pdo->prepare("INSERT INTO benefits (`vacature_id`,`icon`,`icon_class`,`icon_text`) SELECT $vacature_id,`icon`,`icon_class`,`icon_text` FROM benefits WHERE id = id");
    // $stmt->execute();

    // // duplicate activity table
    // $stmt = $pdo->prepare("INSERT INTO activity (`vacature_id`,`activity_name`,`activity_value`) SELECT $vacature_id,`activity_name`,`activity_value` FROM activity WHERE id = id");
    // $stmt->execute();
    
    // // duplicate contact table
    // $stmt = $pdo->prepare("INSERT INTO contact (`vacature_id`,`contact_header`,`contact_name`,`contact_title`,`contact_email`) SELECT $vacature_id,`contact_header`,`contact_name`,`contact_title`,`contact_email` FROM contact WHERE id = id");
    // $stmt->execute();

    // // duplicate vacancy table
    // $stmt = $pdo->prepare("INSERT INTO vacancy (`vacature_id`,`vacancy_header`,`Paragraaph1`,`Paragraaph2`) SELECT $vacature_id,`vacancy_header`,`Paragraaph1`,`Paragraaph2` FROM vacancy WHERE id = id");
    // $stmt->execute();

    // // duplicate workweek table
    // $stmt = $pdo->prepare("INSERT INTO weekday (`vacature_id`,`day`,`event_title`,`event_timeStart`,`event_dateStart`,`event_timeEnd`,`event_dateEnd`,`event_color`,`event_textColor`,`event_description`) SELECT $vacature_id,`day`,`event_title`,`event_timeStart`,`event_dateStart`,`event_timeEnd`,`event_dateEnd`,`event_color`,`event_textColor`,`event_description` FROM weekday WHERE id = id");
    // $stmt->execute();

    // // duplicate practicalExample table
    // $stmt = $pdo->prepare("INSERT INTO practicalexample (`vacature_id`,`peHead`,`quote`,`paragraaph`) SELECT $vacature_id,`peHead`,`quote`,`paragraaph` FROM practicalexample WHERE id = id");
    // $stmt->execute();

    // // duplicate careerGrowth table
    // $stmt = $pdo->prepare("INSERT INTO careergrowth (`vacature_id`,`header`,`paragraaph`) SELECT $vacature_id,`header`,`paragraaph` FROM careergrowth WHERE id = id");
    // $stmt->execute();
    
    // // duplicate growthPath table
    // $stmt = $pdo->prepare("INSERT INTO growthpath (`vacature_id`,`objectText`,`objectImage`) SELECT $vacature_id,`objectText`,`objectImage` FROM growthpath WHERE id = id");
    // $stmt->execute();
    
    // // duplicate Video table
    // $stmt = $pdo->prepare("INSERT INTO video (`vacature_id`,`link`) SELECT $vacature_id,`link` FROM video WHERE id = id");
    // $stmt->execute();
    
    // // duplicate workWithUs table
    // $stmt = $pdo->prepare("INSERT INTO workwithus (`vacature_id`,`header`,`paragraaph`) SELECT $vacature_id,`header`,`paragraaph` FROM workwithus WHERE id = id");
    // $stmt->execute();
    
    // // duplicate workWithUsIcons table
    // $stmt = $pdo->prepare("INSERT INTO workwithusicons (`vacature_id`,`icon_name`,`icon_text`,`icon_class`) SELECT $vacature_id,`icon_name`,`icon_text`,`icon_class` FROM workwithusicons WHERE id = id");
    // $stmt->execute();

    // Redirect to the home page after successfully adding the user to the database
    header("location: data.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Create Vacancy</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Create Vacancy</h1>
        <hr>
        <form action="addData.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">img</label>
                <input type="img" placeholder="img.png" class="form-control" id="img" name="img" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="description" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Vacancy</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>