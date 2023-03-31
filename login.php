<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'dbconnect.php';
  $usernames = $_POST["usernames"];
    $passwords = $_POST["passwords"]; 
    
    $sql = "SELECT * FROM login WHERE usernames='$usernames' AND passwords='$passwords'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 1) {
        $login = true;
        header("Location: welcome.php");
        
    } else {
        $showError = "Invalid Credentials";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Login to our website</h1>
            </div>
            <div class="card-body">
              <form action="login.php" method="post">
                <div class="form-group">
                  <label for="usernames">Username</label>
                  <input type="text" class="form-control" id="usernames" name="usernames" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="passwords">Password</label>
                  <input type="passwords" class="form-control" id="passwords" name="passwords">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            </div>
          </div>
          <?php
          if ($showError) {
            echo '<div class="alert alert-danger mt-3">' . $showError . '</div>';
          }
          ?>
        </div>   
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin>
