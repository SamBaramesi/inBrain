<?php
session_start(); // start session
session_destroy(); // destroy all session data
header("Location: ../../index.php"); // redirect to login page
exit();
?>