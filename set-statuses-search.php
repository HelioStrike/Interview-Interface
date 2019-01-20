<!-- set status and redirect to list of interviews -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

$status = '0000';

if(isset($_POST["checks"]) && is_array($_POST["checks"]))
{
    foreach($_POST["checks"] as $chek)
    {
        $status[$chek] = '1';
    }
}

header("Location: /interview/interview-search-result.php?student_id=".$_POST["student_id"]."&status=".$status);

?>