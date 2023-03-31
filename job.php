<?php

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Job </title>
  </head>
  <body>
    <h1> </h1>
    <h1></h1>

    <?php
    $result = false; 
    $showError = false;

      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $domain = $_POST['domain'];
        $degree = $_POST['degree'];
        $Designation = $_POST['Designation'];
        $Job_Location = $_POST['Job_location'];
        $Key_skills = $_POST['Key_Skills'];
        $JD_Description = $_POST['JD_Description'];
  
        include 'dbconnect.php';
    
         $sql = "INSERT INTO `Jobdescriptions` (`Designation`, `Job_Location`, `JD_Description`, `Key_Skills`, `domain`, `degree`) VALUES ('$Designation', '$Job_Location', '$JD_Description', '$Key_skills', '$domain', '$degree')";
         $result = mysqli_query($conn, $sql);
        
         if ($result) {
             $result = true;
             }

               else {
              $showError = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    }
    ?>
    <?php require 'partials/_nav.php' ?>

<div class="container my-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Job description</h1>
            </div>

      <div class="container my-4">
    <form action="job.php" method= "post">
  <div class="form-row">

    <!--Designation-->
    <div class="form-group col-md-6">
      <label for="Designation">Designation</label>
      <input type="text" class="form-control" id="Designation" name="Designation" placeholder="Designation">
    </div>

    <!--Domain-->
    <div class="form-group col-md-6">
      <label for="domain">Domain</label>
      <select id="domain" class="form-control" name="domain">
        <option selected>Choose...</option>
        <option>Ed-tech</option>
        <option>Agriculture</option>
        <option>E-commerce</option>
        <option>Healthcare</option>
        <option>Fintech</option>
        <option>DevOp</option>
        <option>other</other>
    </select>
      </div>

  <div class="form-group col-md-6">

    <!--Job location-->
    <label for="Job_location">Job location</label>
    <select id="Job_location" class="form-control" name="Job_location">
        <option selected>Choose...</option>
        <option>Pune</option>
        <option>Mumbai</option>
        <option>Hydrabad</option>
        <option>Chennai</option>
        <option>Banglore</option>
    </select>
  </div>

  <!--Job description-->
  <div class="form-group col-md-6 ">
    <label for="JD_Description">Job Description</label>
    <input type="text" class="form-control" id="JD_Description" name="JD_Description" placeholder="Describing the job">
  </div>

  
  <div class="form-row">

    <!--Key skills-->
    <div class="form-group col-md-6">
      <label for="Key_Skills">Key skills</label>
      <input type="text" class="form-control" id="Key_Skills" name="Key_Skills">
    </div>

    <!--degree-->
    <div class="form-group col-md-4">
      <label for="degree">degree</label>
      <input type="text" class="form-control" id="degree" name="degree" placeholder="Degree">
      </div>
      </div>
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
  
</form>
</div>
    </div>
    </div>
    <?php
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your entry has been submitted successfully!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>';
  } 
  
  elseif ($showError) {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> '. $showError.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>';
  }
  
    ?>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </div>
    </div>

