<?php
session_start();
session_unset();

include "db_conn.php";
include "utilities.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio</title>

    <link rel="stylesheet" href="login.css"/>

    <script defer src="index.js">
      window.glob = "editMode";
      window.glob = "deleteMode";
    </script>
    <script defer src="modal.js"></script>
  </head>

  <body>
    <div class="logInForm">
      <form action="loginHandle.php" method="post">
        <?php
              if(isset($_GET['error'])){
            ?>
        <p class="error"><?php echo $_GET['error']; ?></p>

        <?php
          }
            ?>

        <label>Username</label>
        <input type="text" name="uname" placeholder="Username" required/>
        <br/>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required/>
        <br/>

        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>
