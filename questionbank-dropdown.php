<!-- creates a dropdown of question banks -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//select all questions
$command = "SELECT * FROM question_banks_master";
$result = $conn->query($command);

?>

<div class="field">
    <label>Question Banks</label>
    <div class="ui selection dropdown">
        <input type="hidden" name="qbankid">
        <i class="dropdown icon"></i>
        <div class="default text">Type</div>
        <div class="menu">

<?php
//while there are more questions, display the checkbox
while($row = $result->fetch_assoc()) {
?>

            <div class="item" data-value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></div>

<?php
}
?>

        </div>
    </div>
</div>
