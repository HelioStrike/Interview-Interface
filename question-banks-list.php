<?php 

$servername = "localhost";
$username = "root";
$password = "sunny123";
$dbname = "arp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//look for user
$command = "SELECT * FROM question_banks_master";
$result = $conn->query($command);

//if an interview exists
if($result->num_rows > 0)
{

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bank Id</th>
                <th>Description</th>
                <th>Created On</th>
                <th>Created By</th>
            </tr>
        </thead>
        <tbody>

<?php
    //store session variables and redirect
    while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Name"><?php echo $row["name"]; ?></td>
    <td data-label="Bank Id"><?php echo $row["id"]; ?></td>
    <td data-label="Description"><?php echo $row["description"]; ?></td>
    <td data-label="Created On"><?php echo $row["date"]; ?></td>
    <td data-label="Created By"><?php echo $row["created_by"]; ?></td>
</tr>

<?php
    }
}
?>

    </tbody>
</table>
