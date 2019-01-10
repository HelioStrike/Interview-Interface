<?php include 'connect.php'; ?>
<?php

$command = "INSERT INTO interview_history(interview_id, question_id, response_answer, grade) VALUES("
        .$_GET["interview_id"].",".$_GET["question_id"].",".$_GET["response_answer"].",".$_GET["grade"].")";
$conn->query($command);

?>