<?php
session_start();
// if($_SERVER["REQUEST_METHOD"] != "GET")
//   header("Location: /signup.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tp5</title>
  </head>
  <body>
    <h1>SIGN UP</h1>
    <div class="message">
      <p><?php
        if (isset($_SESSION["message"]) && !empty($_SESSION["message"])){ 
          echo $_SESSION["message"]; 
        } 
      ?>
      </p>
    </div>
    <form action="adduser" method="POST">
      <input name="loginup" type="text" placeholder="Put your login here" required />
      <br></br>
      <input name="passwordup" type="password" placeholder="Put your password" required />
      <br></br>
      <input name="confirmpasswordup" type="password" placeholder="Confirm your password" required />
      <br></br>
      <input type="submit" value="Sign up">
    </form>
    <a href="/signin">SIGN IN<a/>
  </body>
</html>
