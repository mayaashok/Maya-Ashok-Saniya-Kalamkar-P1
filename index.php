<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="topnavbar.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="w3-topnavbar">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="index.php" class="w3-bar-item w3-button active"><i class="fa fa-home"></i> HOME</a>
          <a href="entertask-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar-plus-o"></i> ENTER TASKS</a>
          <a href="viewtasks-ui.php" class="w3-bar-item w3-button"><i class="fa fa-calendar"></i> VIEW TASKS</a>
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
      <!-- </div>
    </header> -->
    <div class="w3-container" style="padding: 30px 30px">
      <h3 class="center"style="font-size: 28px">Why Use Planner 101?</h3>
      <div class="w3-row-padding w3-center" style="margin-top: 44px">
        <div class="w3-quarter">
          <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
          <p class="w3-large">Responsive</p>
          <p>
            With Planner 101, you can enjoy a responsive planner, as you can add and delete assignment
            and due dates with no hassle. 
          </p>
        </div>
        <div class="w3-quarter">
          <i class="fa fa-user w3-margin-bottom w3-jumbo"></i>
          <p class="w3-large">Personalized</p>
          <p>
            With Planner 101, enjoy a personalized experience styled to you with your own unique username.
          </p>
        </div>
        <div class="w3-quarter">
          <i class="fa fa-list-ul w3-margin-bottom w3-jumbo"></i>
          <p class="w3-large">Organized</p>
          <p>
            Take control of your life with an easy to our easy-to-use planner. 
          </p>
        </div>
        <div class="w3-quarter">
          <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
          <p class="w3-large">Efficient</p>
          <p> Enjoy our efficient planner as you take make the most of your own time.</p>
        </div>
      </div>
      <br>
    <br>
    <br>
    </div>
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
    background-image: url("homePic.jpeg");
    min-height: 1100px;
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
    width: 50%;
    color: #000;
    background-color: #fff;
    padding: 12px 24px;
    font-size: 18px;
    opacity: 1;
  }
  .startButton:hover {
    background-color: #d1eafe;
  }

.w3-quarter{float:left;width:100%}
.w3-quarter{width:24.99999%}
.w3-row-padding:after,.w3-row-padding:before,

.w3-border-0{border:0!important}.w3-border{border:1px solid #ccc!important}
</style>
