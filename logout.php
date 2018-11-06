<!-- Logs out users by destroying session -->
<?php

session_start();
session_destroy();
header("Location: /interview/login.php");

?>