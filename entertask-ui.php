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
    <div class="w3-topnavbar">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
          <a href="entertask-ui.php" class="w3-bar-item w3-button active"><i class="fa fa-calendar-plus-o"></i> ENTER TASKS</a>
          <a href="viewtasks-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar"></i> VIEW TASKS</a>
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
              <h2 style="text-align:center; color:white;" ><b>Enter Your Tasks:</b></h2>
              <p class="error">* required field</p>
              <label for="userName" style="color:white; font-size:20px;"><b>Enter Your Username:</b></label>
              <span class="error">* </span>
              <!--The input type is defined, the function clearmsg is called, and the information inputed is retained -->
              <input type="text" onclick="clearmsg()" placeholder="Enter Your Username" name="userName" required value="<?php echo $userName;?>">

              <br>
              <label for="taskDate" style="color:white; font-size:20px;"><b>Pick A Date:</b></label>
              <span class="error">* </span>
              <input type="date" onclick="clearmsg()" name="taskDate" required value="<?php echo $taskDate;?>">
              
              <br>
              <label for="taskName" style="color:white; font-size:20px;"><b>Enter A Task:</b></label>
              <span class="error">* </span>
              <input type="text" onclick="clearmsg()" placeholder="Enter A Task" name="taskName" required value="<?php echo $taskName;?>" >
                  
              <button type="input" name="submit" style="font-size:15px;"><b>ADD TASK</b></button>
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
      $message = $userName . "'s task: " . $taskName . " added successfully on " .  $taskDate;
      echo "<div class=\"container\" ><h2 id=\"msgid\" style=\"color:#319490;text-align:center;font-size:22px;\"><b>$message</b></h2>";
    } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
      echo "<div class=\"container\" ><h2 id=\"msgid\" style=\"color:#DF152F;text-align:center;font-size:22px;\">$message </h2>";
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
  /* background-color: #154c79; */
  background-color: #b6c6d3;
  /* background-color: #8ab1c8; */
  width: 50%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0px;
}

.error {
  color: #DF152F;
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
  font-family: "Raleway", sans-serif;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 0px solid #fff;
  box-sizing: border-box;
}

button {
  background-color: white;
  font-family: "Raleway", sans-serif;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 70%;
}

button:hover {
  background-color: #d1eafe;
}
.bgimg-enter{
  background-position: center;
    background-size: cover;
    background-image: url("enterImage.jpeg");
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

