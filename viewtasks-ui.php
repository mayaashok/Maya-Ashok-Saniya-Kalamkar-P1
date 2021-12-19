<?php
    // get database connection info
    require_once 'dbconfig.php';
    
    //Retain form data after a POST
    $userName  = "";
    $taskDate  = "";
    if (isset($_POST["userName"]) && isset($_POST["taskDate"])) {
      $userName  = $_POST["userName"];
      $taskDate  = $_POST["taskDate"];
    }
?>

<!-- Javascript for clearing the post messages onclick within a field -->
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
        <a href='entertask-ui.php'>Enter Tasks</a>
        <a class='active' href='viewtasks-ui.php'>View Tasks</a>
    </div> -->
    <div class="w3-topnavbar">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
          <a href="entertask-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar-plus-o"></i></i> ENTER TASKS</a>
          <a href="viewtasks-ui.php" class="w3-bar-item w3-button active"><i class="fa fa-calendar"></i></i> VIEW TASKS</a>
        </div>
  </head>
<body>
<header class = "bgimg-view">

<!-- Form Inputs -->
<section>
  <br>
      <form action="viewtasks-ui.php" method="post">
         <div class="container">
         <h2 style="text-align:center;" >View Your Tasks:</h2>
         <p class="error">* required field</p>
         <label for="userName"><b>Enter Username</b></label>
              <span class="error">* </span>
              <input type="text" onclick="clearmsg()" name="userName" required placeholder="Enter your username" value="<?php echo $userName;?>" >
                  
              <label for="taskDate"><b>Choose a Date</b></label>
              <span class="error">* </span>
              <input type="date" onclick="clearmsg()" name="taskDate" required value="<?php echo $taskDate;?>" >
                  
              <button type="input" name="submit">View Your Tasks</button>
          </div>

<!-- POST Method Code to handle Form input-->
<?php

$taskDate = "";
$userName = "";
$message  = "";
 
// Check if userName and taskDate is set in the POST
if (isset($_POST["userName"]) && isset($_POST["taskDate"]))
{
 
/*  Delete selected tasks from the database */
      //get selected tasks
      $selected_taskID = [];
      if (isset($_POST["task_Array"])) {
        $selected_taskID = $_POST["task_Array"];
      }

      // if selected_taskID has values then connect to database and delete tasks
      if ($selected_taskID) {
        // connect to database 
        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName,$port);
    
        // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

        // Construct the Query
        $IDs = join("','" , $selected_taskID );
        $sql="DELETE FROM tasks1 WHERE tasksID IN ('$IDs')";
        
        // Execute the query
        if ($conn->query($sql) === TRUE) {
          $message = "Task(s) deleted successfully";
        } else {
          $message = "Error deleting record: " . $conn->error;
        }
        // Execute the query
        $conn->close();
      }
      else {
      // If delete is pressed and no task is selected
        if (isset($_POST['delete'])) {
            $message = "select tasks(s) from checkbox to delete tasks";
        }
      }
  /* End of delete processing code */

  /*Get tasks from the database and output in table */
    $userName  = $_POST["userName"];
    $taskDate  = $_POST["taskDate"];

    // connect to database 
    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName,$port);
    
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    
    // Construct the query 
        $sql="SELECT * FROM tasks1 WHERE tasksDate = '{$taskDate}' AND usersName= '{$userName}'";
     
     // Execute the query
     $result=$conn->query($sql);

     //Get no of rows returned and output data in HTML table.
     $num_rows = $result->num_rows;
     if ($num_rows > 0) { 
  
        echo "<div class=\"container\">";
        echo "<table class=\"center\" style=\"background-color: white;\" border=1px color=solid black>";
        echo "<tr>";
            echo "<th> </th>";
            echo "<th> User:". $userName . " - Tasks for the day:" . $taskDate . "</th>";
        echo "</tr>";
        while($rowData=$result->fetch_assoc()) {
          $taskID = $rowData['tasksID'];
          echo "<tr>";
              echo "<td>";
              echo "<input type=\"checkbox\"  value=\"". $taskID . "\" name=\"task_Array[]\"/>";
              echo "</td>";
              echo "<td>";
              echo $rowData['tasksName'];
              echo "</td>";             
          echo "</tr>";
        }
        echo "</table>";
        echo "<button type=\"input\" name='delete'>Delete Selected Tasks </button>";
        echo "</div>";
     }
     else if ($num_rows == 0 && !isset($_POST['delete'])) {

      $message = "No tasks for the username and date combination";
     }
    $conn->close();
/* End of Get tasks from the database and output in table */
}
?>

</form>

<?php
  echo "<div class=\"container\"> <h2 id=\"msgid\" style=\"color:red;text-align:center;background-color: white;\">$message </h2>";

?>

</section>
</header>
</body>
</html>

<!-- Internal CSS Styling for the viewtask page -->
<style>

.error {color: #FF0000;}
body {
  font-family: "Raleway", sans-serif;
  text-align: center;

}
form {
  border:none;
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
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #a7cdf1;
}

.container {
  padding: 16px;
  background-color: white;
  width: 50%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0px;
}

.center {
    margin-left: auto;
    margin-right: auto;
}
.bgimg-view{
  /* background-position: center;
  background-image: url("viewPic.jpeg");
  min-height: 100%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%; */

  background-position: center;
    background-size: cover;
    background-image: url("viewPic.jpeg");
    min-height: 900px;
    background-repeat: no-repeat;
}
.center-form{
	width:400px;
	margin: 0 auto;
}

</style>