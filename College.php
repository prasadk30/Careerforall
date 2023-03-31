<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $College_Name = $_POST["College_Name"];
    $College_Address = $_POST["College_Address"];
    $College_Grade = $_POST["College_Grade"];
    
    $sql = "INSERT INTO `College` ( `College_Name`, `College_Address`, `College_Grade`) VALUES ('$College_Name', '$College_Address', '$College_Grade')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $showAlert = true;
    }
    else{
        $showError = "Passwords do not match";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>College Information</title>
  </head>

  <body>
  <?php require 'partials/_nav.php' ?>

    <div class="container my-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">College Information</h1>
            </div>
            <div class="card-body">
              <form action="College.php" method="post">
                <div class="form-group">
                  <label for="usernames">College Name</label>
                  <input type="text" class="form-control" id="usernames" name="College_Name" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                  <label for="College_Address">College Address</label>
                  <input type="text" class="form-control" id="College_Address" name="College_Address">
                </div>

                <div class="form-group">
                  <label for="College_Grade">College Grade</label>
                  <select id="College_Grade" class="form-control" name="College_Grade">
                    <option selected>Choose Grade</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
             
              </form>
            </div>
          </div>
          <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Thanks Your Information is Submited
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


        </div>
      </div>
    </div>
    
