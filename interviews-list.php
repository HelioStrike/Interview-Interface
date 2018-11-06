<!-- displays the list of interviews -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//look for user
$command = "SELECT * FROM interviews_master";
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Student Id</th>
                <th>Description</th>
                <th>Question Bank Id</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Delete</th>
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
    <td data-label="Description"><?php echo $row["description"]; ?></td>
    <td data-label="Question Bank Id"><?php echo $row["bank_id"]; ?></td>
    <td data-label="Start Time"><?php echo $row["start_time"]; ?></td>
    <td data-label="End Time"><?php echo $row["end_time"]; ?></td>
    <td data-label="Status"><?php echo $row["status"]; ?></td>
    <td data-label="Delete"><a href="/interview/delete-interview.php?id=<?php echo $row["interview_id"]; ?>"><i class="x icon"></i></a></td>
</tr>

<?php
}
?>

    </tbody>
</table>
