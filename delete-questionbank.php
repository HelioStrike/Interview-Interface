<!-- delete question bank -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//delete question bank with given id
$command = "DELETE FROM question_banks_master WHERE id=".$_GET["id"];
$result = $conn->query($command);

$command = "DELETE FROM question_to_bank WHERE bank_id=".$_GET["id"];
$result = $conn->query($command);

header("Location: /interview/question-banks.php?begin=0&recordnum=10");

?>