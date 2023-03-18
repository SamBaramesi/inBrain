<?php

// ini_set('memory_limit', '4096M');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inBrain";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>