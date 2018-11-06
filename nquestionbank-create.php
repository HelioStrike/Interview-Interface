<?php include 'connect.php'; ?>
<?php


//finding number of question banks
$command = "SELECT * FROM next_ids";
$result = $conn->query($command);
$row = $result->fetch_assoc();
$qbcount = $row["question_banks"];

$command = "UPDATE next_ids SET question_banks=".($qbcount + 1)." WHERE question_banks=".$qbcount;
$conn->query($command);

//look for user
$command = "INSERT INTO question_banks_master(name, id, description, created_by) VALUES('" . $_POST["name"] . "'," . $qbcount . ",'" .
     $_POST["description"] . "','" . $_SESSION["username"] . "')";

$conn->query($command);


if(isset($_POST["questions"]) && is_array($_POST["questions"]))
{
    foreach($_POST["questions"] as $question_id)
    {
        $command = "INSERT INTO question_to_bank(question_id, bank_id) VALUES(" . $question_id . "," . $qbcount . ")";
        $conn->query($command);
    }
}

header("Location: /interview/question-banks.php");

?>