<?php include 'intruder.php'; ?>
<?php include 'connect.php'; ?>
<?php

$command = "SELECT * FROM question_banks_master WHERE id=".$_GET["id"];
$result = $conn->query($command);

if($result->num_rows == 0)
{
    header("Location: /interview/question-banks.php");
}

$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="ISO-8859-1">
    <title><?php echo $row["name"]; ?> - Question Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
    <link rel="stylesheet" href="src/css/main.css">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</head>
  <body>

  	<div class="ui huge inverted menu" id="indexnav">
      <div class="ui container">
      
        <a class="header item" href="/interview/dashboard.php">
          <p class="menu-btn" style="font-size:30px; margin: 10px;"><i class="angle double right icon"></i>Interview</p>
        </a>

        <div class="right menu">
            <div class="ui item"><?php echo $_SESSION["username"] ?></div>
            <a class="ui item" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
	

    <div class="ui middle aligned grid">
      <div class="column">
        <div class="ui text container">
          <div class="ui segment">
            <div class="ui center aligned huge header"><?php echo $row["name"]; ?> - Question Bank</div>
            <form class="ui form" action="questionbank-edit.php" method="post">

              <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />

              <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="<?php echo $row["name"] ?>">
              </div>
            
              <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="<?php echo $row["description"] ?>">
              </div>

              <?php include 'question-checkboxes.php'; ?>

              <div class="ui center aligned container">
                <button class="ui button" type="submit">Submit</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <script>
        $('.ui.checkbox').checkbox();
    </script>

  </body>
</html>
