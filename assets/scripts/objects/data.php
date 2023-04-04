<?php
    $vacatureID = $_GET['id'];
?>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<script>
    let jsonData = null;

    $.ajax({
        async: false,
        global: false,
        url: "/inBrain/vacaturejson.php",
        dataType: "json",
        success: function(data) {
            jsonData = data;
        }
    });
</script>

<?php
    header('location: /inBrain/vacaturejson.php?id=' . $vacatureID);
?>