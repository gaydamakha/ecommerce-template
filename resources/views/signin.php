<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tp5</title>
  </head>
  <body>
    <h1>SIGN IN</h1>
    <div class="message">
      <p><?php
        if (isset($_SESSION["message"]) && !empty($_SESSION["message"])){ 
          echo $_SESSION["message"]; 
        } 
      ?>
      </p>
    </div>
    <form action="authenticate" method="post">
      <input name="login" type="text" placeholder="Put your login here" required />
      <br></br>
      <input name="password" type="password" placeholder="Put your password here" required />
      <br></br>
      <input type="submit" value="Sign in">
    </form>
    <a href="/signup">SIGN UP<a/>
  </body>
</html>
