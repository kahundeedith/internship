<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Secure the input to prevent SQL injection
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "INSERT INTO `registration` (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h>Signup Page</h>
    <div class="container">
      <form action="sign.php" method="post">
        <div class="mb-3">
          <label for="username">Name</label>
          <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
        </div>
        <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
