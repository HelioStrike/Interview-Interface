<!-- interview search page -->
<?php include 'intruder.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="ISO-8859-1">
    <title>Interview Search</title>
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
	

    <div class="ui middle aligned grid wrapper">
      <div class="column">
        <div class="ui text container">
          <div class="ui segment">
            <div class="ui center aligned huge header">Search Interviews</div>
            <form class="ui form" action="get-interviews.php" method="post">
            
              <div class="field">
                <label>Student ID</label>
                <input type="text" name="student_id" placeholder="Student ID">
              </div>
            
              <div class="ui center aligned container">
                <button class="ui button" type="submit">Submit</button>
              </div>
            </form>
			
          </div>
        </div>
      </div>
    </div>

    <script>
        $('.ui.dropdown').dropdown();    
    </script>
  </body>
</html>