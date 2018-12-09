<?php
	session_start();
    if(!array_key_exists("user", $_SESSION))
        header("Location: /signin");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My account - Tp5</title>
    </head>
    <body>
        <div class="message">
          <p><?php
            if (isset($_SESSION["message"]) && !empty($_SESSION["message"])){ 
              echo $_SESSION["message"]; 
            } 
          ?>
          </p>
        </div>
        <p>
			Hello <?php echo $_SESSION["user"] ?> !<br></br>
			Welcome on your account.<br></br>
            <a href="/account/formpassword">Change password<a/>
            <br></br>
            <a href="/account/deleteuser">Delete account<a/>
            <br></br>
            <a href="/account/signout">Deconnexion<a/>
		</p>
    </body>
</html>
