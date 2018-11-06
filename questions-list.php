<!-- displays the list of all questions -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//select all questions
$command = "SELECT * FROM questions_master";
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Type</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

<?php
//while there are more questions, push them onto the table
while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Id"><?php echo $row["id"]; ?></td>
    <td data-label="Question"><?php echo $row["question"]; ?></td>
    <td data-label="Answer"><?php echo $row["answer"]; ?></td>
    <td data-label="Type"><?php echo $row["type"]; ?></td>
    <td data-label="Created On"><?php echo $row["date"]; ?></td>
    <td data-label="Created By"><?php echo $row["created_by"]; ?></td>
    <td data-label="Delete"><a href="/interview/delete-question.php?id=<?php echo $row["id"]; ?>"><i class="x icon"></i></a></td>
</tr>

<?php
}
?>

    </tbody>
</table>
