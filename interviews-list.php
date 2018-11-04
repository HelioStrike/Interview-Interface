<?php 

$servername = "localhost";
$username = "root";
$password = "sunny123";
$dbname = "arp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//look for user
$command = "SELECT * FROM interviews_master";
$result = $conn->query($command);

//if an interview exists
if($result->num_rows > 0)
{

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

<?php
    //store session variables and redirect
    while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Interview Id"><?php echo $row["interview_id"]; ?></td>
    <td data-label="Description"><?php echo $row["description"]; ?></td>
    <td data-label="Start Time"><?php echo $row["start_time"]; ?></td>
    <td data-label="End Time"><?php echo $row["end_time"]; ?></td>
    <td data-label="Status"><?php echo $row["status"]; ?></td>
</tr>

<?php
    }
}
?>

    </tbody>
</table>
