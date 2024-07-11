<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Secure the input to prevent SQL injection
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // Use backticks around the table name
    $sql = "SELECT * FROM `registration` WHERE username='$username' AND password='$password'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "login successful";
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        } else {
            echo "invalid data";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h>Login to our system</h>
    <div class="container">
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
  </div>
      <div class="mb-3">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
        </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password"  name="password">
  </div>
  <button type="login" class="btn btn-primary ">Login</button>
</form>
    </div>
    
  </body>
</html>