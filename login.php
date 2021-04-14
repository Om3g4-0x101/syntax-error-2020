<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="resources/img/logo_size.jpg" type="image/gif" sizes="30*30"> 
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>Omnifood</title>
    </head>
    <body>
        <form action="/lg.php" method="post">
            <div class="imgcontainer">
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>
          
            <div class="container">
              <label for="email"><b>Email ID</b></label>
              <input type="text" placeholder="Enter your Gsuite-ID" value="<?php if(isset($_COOKIE['id'])) { echo $_COOKIE['id']; } ?>" name="email" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE['pwd'])) { echo $_COOKIE['pwd']; } ?>" name="psw" required>
          
              <button type="submit">Login</button>
            </div>
          
            <div class="container" style="background-color:#f1f1f1">
              <a href="https://chapo-asap.000webhostapp.com/"><button type="button" class="cancelbtn">Cancel</button></a>
            </div>
          </form>
    </body>

