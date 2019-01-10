<?php include 'connect.php'; ?>
<?php

$command = "SELECT * FROM interview_history WHERE interview_id=".$_GET["interview_id"];
$result = $conn->query($command);

if($result->num_rows > 0)
{
    //print out question_id
    while($row = $result->fetch_assoc()) {
        echo $row["question"]."|||".$row["response_answer"]."|||".$row["grade"]."|||".$row["created_on"]."||||";
    }
}

?>