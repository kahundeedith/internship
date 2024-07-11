<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Page</title>
  </head>
  <body>
    <h1>Welcome
        <?php echo $_SESSION['username'];?>
    </h1>
    <div class="container">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
  </body>
</html>