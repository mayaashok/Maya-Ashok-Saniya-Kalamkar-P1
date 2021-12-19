<?php
    // includes the php file to connect to database info
    require_once 'dbconfig.php';

    // Sets variables to empty values
    $userName  = "";
    $taskDate  = "";
    $taskName  = "";

    //Retain form data after a POST
    if (isset($_POST["userName"]) && isset($_POST["taskDate"]) && isset($_POST["taskName"])) {
      $userName  = $_POST["userName"];
      $taskDate  = $_POST["taskDate"];
      $taskName  = $_POST["taskName"];
    }
?>

<!-- Javascript function for clearing the post messages onclick within a field -->
<script>
  function clearmsg()
  {
    document.getElementById("msgid").innerHTML = "";
  }
</script>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- External CSS shared across all pages for TOP Navigation styling -->
    <link rel="stylesheet" type="text/css" href="topnavbar.css"/>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- <div class="topnav">
        <a href='index.php'>Home</a>
        <a class='active' href='entertask-ui.php'>Enter Tasks</a>
        <a href='viewtasks-ui.php'>View Tasks</a>
    </div> -->
    <div class="w3-topnavbar">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
          <a href="entertask-ui.php" class="w3-bar-item w3-button active"><i class="fa fa-calendar-plus-o"></i></i> ENTER TASKS</a>
          <a href="viewtasks-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar"></i></i> VIEW TASKS</a>
        </div>
  </head>
<body>
<header class = "bgimg-enter">
<!-- Form Inputs -->
<!-- Form in which POST collects data inputed (Username, date, task) from input fields and includes submit button-->
<section> 
  <br>
      <form action="entertask-ui.php" method="post">
         <div class="container">
              <h2 style="text-align:center;" > Enter Your Tasks:</h2>
              <p class="error">* required field</p>
              <label for="userName"><b>Enter Your Username</b></label>
              <span class="error">* </span>
              <!--The input type is defined, the function clearmsg is called, and the information inputed is retained -->
              <input type="text" onclick="clearmsg()" placeholder="Enter your username" name="userName" required value="<?php echo $userName;?>">

              <br>
              <label for="taskDate"><b>Choose a Date</b></label>
              <span class="error">* </span>
              <input type="date" onclick="clearmsg()" name="taskDate" required value="<?php echo $taskDate;?>">
              
              <br>
              <label for="taskName"><b>Enter a Task</b></label>
              <span class="error">* </span>
              <input type="text" onclick="clearmsg()" placeholder="Enter task and click add" name="taskName" required value="<?php echo $taskName;?>" >
                  
              <button type="input" name="submit">ADD TASK</button>
            </div>
      </form>
</section>
<!-- </header>
</body>
</html> -->

<!-- POST Method Code to handle Form input-->
<?php
// Sets variables to empty values
$taskDate = "";
$taskName = "";
$userName = "";
$result   = "";

//Checks if the input fields were used 

if (isset($_POST["userName"]) && isset($_POST["taskDate"]) && isset($_POST["taskName"]))
{
    //Defines variables that were retained from form data using POST, sets variable message to empty value
    $userName  = $_POST["userName"];
    $taskDate  = $_POST["taskDate"];
    $taskName  = $_POST["taskName"];
    $message   = "";
 
    // connects to database 
    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName,$port);
    
    // Checks connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    
    // Constructs the query, inserts new values into the table
    $sql = "INSERT INTO tasks1(usersName, tasksName, tasksDate) 
          VALUES ('$userName', '$taskName','$taskDate')";
    
    // Executes the query
    if ($conn->query($sql) === TRUE) {
      $message = $taskName . "  for " .  $taskDate . "  added successfully";
      echo "<div class=\"container\" ><h2 id=\"msgid\" style=\"color:green;text-align:center;background-color:white;\">$message </h2>";
    } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
      echo "<div class=\"container\" ><h2 id=\"msgid\" style=\"color:red;text-align:center;background-color:white;\">$message </h2>";
    }

    // Close connection to database
    $conn->close();
  }
?>

</header>
</body>
</html>

<!-- Internal CSS Styling for the entertask page -->
<style>

.container {
  top: 10px;
  padding: 16px;
  background-color: white;
  width: 50%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0px;
}

.error {
  color: #FF0000;
  margin-left: auto;
  margin-right: auto;
}

body {
  font-family: "Raleway", sans-serif;
  text-align: center;
}

form {
  border: none;
  solid #f1f1f1;
  margin: auto;
}

input[type=text], input[type=password], input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color:#66abec;
  font-family: "Raleway", sans-serif;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #a7cdf1;
}
.bgimg-enter{
  background-position: center;
    background-size: cover;
    background-image: url("enterPic.jpeg");
    min-height: 900px;
    background-repeat: no-repeat;

  /* background-position: center;
  background-image: url("enterPic.jpeg");
  min-height: 900px;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; */
}
</style>

