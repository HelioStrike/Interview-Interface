<!-- displays the list of interviews -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//look for grades
$command = "SELECT * FROM interview_history WHERE interview_id=".$_GET["interview_id"];
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Student Id</th>
                <th>Question</th>
                <th>Response Answer</th>
                <th>Grade</th>
                <th>Created On</th>
            </tr>
        </thead>
        <tbody>

<?php
//while there are more interviews, push them onto the table
while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Interview Id"><?php echo $row["interview_id"]; ?></td>
    <td data-label="Student Id"><?php echo $row["student_id"]; ?></td>
    <td data-label="Question"><?php echo $row["question"]; ?></td>
    <td data-label="Response Answer"><?php echo $row["response_answer"]; ?></td>
    <td data-label="Grade"><?php echo $row["grade"]; ?></td>
    <td data-label="Created On"><?php echo $row["created_on"]; ?></td>
</tr>

<?php
}
?>

    </tbody>
</table>
