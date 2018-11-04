<?php

session_start();
if($_SESSION['username'] == '')
{
    header('Location: /interview/login.php');
}

?>