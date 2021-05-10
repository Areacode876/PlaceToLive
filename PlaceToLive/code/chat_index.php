<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>
<?php include("chat_config.php");include("login.php");?>
<!DOCTYPE html>
<html>
 <head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
  <title>Communication</title>
 </head>
 <body>
  <div id="content" style="margin-top:10px;height:100%;">
   <center><h1>Chat</h1></center>
   <div class="chat">
    <div class="users">
     <?php include("users.php");?>
    </div>
    <div class="chatbox">
     <?php
     if(isset($_SESSION['user'])){
      include("chatbox.php");
     }else{
      $display_case=true;
      include("login.php");
     }
     ?>
    </div>
   </div>
  </div>
 </body>
</html>
