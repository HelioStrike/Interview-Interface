<!-- kicks intruders back to login page -->
<?php

session_start();
if($_SESSION['username'] == '')
{
    header('Location: /interview/login.php');
}

?>