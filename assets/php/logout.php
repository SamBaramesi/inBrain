<?php
session_start(); // start session
session_destroy(); // destroy all session data
header("Location: ../../index.html"); // redirect to login page
exit();
?>