<?php
session_start();
// if($_SERVER["REQUEST_METHOD"] != "GET" || !isset($_SESSION['user']) || empty($_SESSION["user"])){
//   header("Location: /signin.php");
//   exit;
//}
if(!isset($_SESSION['user']) || empty($_SESSION["user"])){
  header("Location: /signin");
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change passsword - Tp5</title>
  </head>
  <body>
    <h1>Change password</h1>
    <div class="message">
      <p><?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])){ 
          echo $_SESSION['message']; 
        } 
      ?>
      </p>
    </div>
    <form action="changepassword" method="POST">
      <input name="chpassword" type="password" placeholder="Put new password here" required />
      <br></br>
      <input name="confchpassword" type="password" placeholder="Confirm your password" required />
      <br></br>
      <input type="submit" value="Submit">
      <br></br>
    </form>
    <a href="/account/welcome">My home page<a/>
  </body>