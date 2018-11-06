<!-- edit existing question bank -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//fetching and editing question_bank
$command = "SELECT * FROM question_banks_master WHERE id=".$_POST["id"];
$result = $conn->query($command);
$row = $result->fetch_assoc();

if($_POST["name"] != '')
{
    $row["name"] = $_POST["name"];
}

if($_POST["description"] != '')
{
    $row["description"] = $_POST["description"];
}

$command = "UPDATE question_banks_master SET name='".$row["name"]."', description='".$row["description"]."' WHERE id=".$_POST["id"];
$conn->query($command);


//clear previous mappings and generate new ones
if(isset($_POST["questions"]) && is_array($_POST["questions"]))
{
    $command = "DELETE FROM question_to_bank WHERE bank_id=".$_POST["id"];
    $conn->query($command);    

    foreach($_POST["questions"] as $question_id)
    {
        $command = "INSERT INTO question_to_bank(question_id, bank_id) VALUES(" . $question_id . "," . $_POST["id"] . ")";
        $conn->query($command);
    }
}

header("Location: /interview/question-banks.php");

?>