<?php include 'intruder.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="ISO-8859-1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
    <link rel="stylesheet" href="src/css/main.css">
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
	
    <div class="ui text container">
      <div class="ui three column stackable grid">
        <div class="column">
          <a href="interviews.php"><div class="ui button">Interviews</div></a>
        </div>
        <div class="column">
          <a href="interviews.php"><div class="ui button">Question Banks</div></a>
        </div>
        <div class="column">
          <a href="interviews.php"><div class="ui button">Questions</div></a>
        </div>
      </div>
    </div>


  </body>
</html>
