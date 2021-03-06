<!-- interview scheduling page -->
<?php include 'intruder.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="ISO-8859-1">
    <title>New Interview</title>
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
            <div class="ui center aligned huge header">New Interview</div>
            <form class="ui form" action="ninterview-create.php" method="post">
            
              <div class="field">
                <label>Student Id</label>
                <input type="text" name="studentid" placeholder="Student Id">
              </div>

              <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
              </div>
            
              <div class="field">
                <label>Start Time</label>
                <input type="text" name="startyear" placeholder="Year" style="width:15%;" value="<?php echo date("Y"); ?>"> 
                <input type="text" name="startmonth" placeholder="Month" style="width:15%;" value="<?php echo date("m"); ?>"> 
                <input type="text" name="startday" placeholder="Day" style="width:15%;" value="<?php echo date("d"); ?>">
                <input type="text" name="starthour" placeholder="Hour" style="width:15%;" value="<?php echo date("H"); ?>">
                <input type="text" name="startminute" placeholder="Minute" style="width:15%;" value="<?php echo date("i"); ?>">
              </div>

              <div class="field">
                <label>End Time</label>
                <input type="text" name="endyear" placeholder="Year" style="width:15%;" value="<?php echo date("Y"); ?>"> 
                <input type="text" name="endmonth" placeholder="Month" style="width:15%;" value="<?php echo date("m"); ?>"> 
                <input type="text" name="endday" placeholder="Day" style="width:15%;" value="<?php echo date("d"); ?>">  
                <input type="text" name="endhour" placeholder="Hour" style="width:15%;" value="<?php echo date("H"); ?>">  
                <input type="text" name="endminute" placeholder="Minute" style="width:15%;" value="<?php echo date("i"); ?>">  
              </div>

              <div class="field">
                <label>Number of Questions</label>
                <input type="text" name="numquestions" placeholder="Number of Questions">
              </div>

              <?php include 'questionbank-dropdown.php'; ?>

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
