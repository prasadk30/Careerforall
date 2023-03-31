<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'dbconnect.php';
  $Company_Name = $_POST["Company_Name"];
    $Category = $_POST["Category"];
    $Registration_Date = $_POST["Registration_Date"];
   // $cpassword = $_POST["cpassword"];
    
        $sql = "INSERT INTO `Startup` ( `Company_Name`, `Category`,`Registration_Date`) VALUES ('$Company_Name', '$Category','$Registration_Date')";
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
    <style>
      body {background-color: bisque; box-sizing: content-box;}
      h1 {text-align: center;}
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>StartUp Onboarding</title>
  </head>
  <body>
  <?php require 'partials/_nav.php' ?>

  <div class="container my-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">StartUp Onboarding</h1>
            </div>

            <div class="card-body">
     <h1 class="text-center"></h1>
     <form action="Startup.php" method="post">
        <div class="form-group">
            <label for="Company_Name">Company Name</label>
            <input type="text" class="form-control" id="Company_Name" name="Company_Name" aria-describedby="emailHelp">
        </div>
        
          <div>
            <label for="">Registration date:</label>
            <input type="date" id="Registration_Date" name="Registration_Date">

        </div>
        <div class="form-group">
            <label for="Category">Category</label>
            <input type="Category" class="form-control" id="Category" name="Category">
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
    </div>
    </div>
    </div>

