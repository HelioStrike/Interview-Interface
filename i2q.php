<!-- returns question_ids given the interview_id -->
<!-- establish connection to mysql -->
<?php include 'connect.php'; ?>
<?php

//select question_id
$command = "SELECT question_id FROM temporary_question_bank WHERE id = '" . $_GET["interview_id"] . "'";
$result = $conn->query($command);

//if such entries exist
if($result->num_rows > 0)
{
    //print out question_id
    while($row = $result->fetch_assoc()) {
        echo $row["question_id"] . ",";
    }
}
?>