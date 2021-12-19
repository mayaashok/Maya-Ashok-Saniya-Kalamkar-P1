<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="topnavbar.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <div class="topnav">
        <a class='active' href='index.php'>Home</a>
        <a href='entertask-ui.php'>Enter Tasks</a>
        <a href='viewtasks-ui.php'>View Tasks</a>
  </div>  -->
  <div class="w3-topnavbar">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="index.php" class="w3-bar-item w3-button active"><i class="fa fa-home"></i> HOME</a>
          <a href="entertask-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar-plus-o"></i></i> ENTER TASKS</a>
          <a href="viewtasks-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar"></i></i> VIEW TASKS</a>
        </div>

  </head>
 
  <body>
  
<header class="bgimg-1" id="home">
      <div>
        <p class="center" style="font-size: 36px">Welcome to PLANNER 101!</p>
        <p class="center" style="font-size: 28px"><b>This planner provides the following features:</b></p>
        <ul class="list" style="list-style-type:number; font-size: 20px;">
        <li> <b> Enter the tasks for a day </b></li>
        <li> <b> View the tasks for a day </b> </li>
        <li> <b> Delete tasks for a day </b> </li>
      </ul>
      <p class="center" style="font-size: 28px">Click the start button to get started!</p>
        <p class="center">
          <a href="entertask-ui.php" class="startButton">START</a>
        </p>
      </div>
    </header>

 
  </body>
</html>
 
<style>
  body {
    font-family: "Raleway", sans-serif;
  }
  header {
    position: relative;
    filter: grayscale(50%);
  }
  .center {
    text-align:center;
    margin: auto;
    width: 80%;
    padding-top:50px;;
  }
  .list {
    padding-left:45%;
  }
  .bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("indexImg.jpeg");
    min-height: 900px;
  }
  .startButton {
    border: none;
    display: inline-block;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: normal;
    width: 100%;
    color: #000;
    background-color: #fff;
    padding: 12px 24px;
    font-size: 18px;
    opacity: 1;
  }
  .startButton:hover {
    background-color: #a7cdf1;
  }
</style>
