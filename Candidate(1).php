<!doctype html>
<html lang="ar" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>candidate form</title>
  </head>
  <body>
  <?php require 'partials/_nav.php' ?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $F_name= $_POST['F_name'];
    $M_name= $_POST['M_name'];
    $L_name= $_POST['L_name'];
    $Gender= $_POST['Gender'];
    $Marital_Status=$_POST['Marital_Status'];
    $City=$_POST['City'];
    $Login_Email=$_POST['Login_Email'];
    $Contact_No=$_POST['Contact_No'];
    $UG_Course=$_POST['UG_Course'];
    $PG_Course=$_POST['PG_Course'];
    $Organization=$_POST['Organization'];
    $College_id=$_POST['College_id'];
    $Designation=$_POST['Designation'];
    $Notice_Period=$_POST['Notice_Period'];
    $IT_Exp=$_POST['IT_Exp'];
    $Total_Exp=$_POST['Total_Exp'];
    $Current_CTC=$_POST['Current_CTC'];
    $Expected_CTC=$_POST['Expected_CTC'];
    $Preferred_Location=$_POST['Preferred_Location'];
    $Skill_Category=$_POST['Skill_Category'];
    $Key_Skills=$_POST['Key_Skills'];
    $Resume_Title=$_POST['Resume_Title'];

    $filename= $_FILES["Attach_Resume"]["name"];
    $tempname= $_FILES["Attach_Resume"]["tmp_name"];
    $folder="candidate_resume/".$filename;
    move_uploaded_file($tempname,$folder);

    include 'dbconnect.php';
 
      $sql="INSERT INTO `Candidate` (`F_name`, `M_name`, `L_name`,`Gender`,`Marital_Status`,`City`,`Login_Email`,`Contact_No`,
      `UG_Course`,`PG_Course`,`Organization`,`College_id`,`Designation`,`Notice_Period`,`IT_Exp`,`Total_Exp`,`Current_CTC`,`Expected_CTC`,
      `Preferred_Location`,`Skill_Category`,`Key_Skills`,`Resume_Title`,`Attach_Resume`)
      values('$F_name','$M_name','$L_name','$Gender','$Marital_Status','$City','$Login_Email','$Contact_No','$UG_Course',
      '$PG_Course','$Organization','$College_id','$Designation','$Notice_Period','$IT_Exp','$Total_Exp','$Current_CTC','$Expected_CTC',
      '$Preferred_Location','$Skill_Category','$Key_Skills','$Resume_Title','$folder')";

      $result=mysqli_query($conn , $sql);
     
     if($result){
     echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Successfull ! </strong> your form has been submited
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
     else
     { 
      echo "Form not submitted because of this error ".mysqli_error($conn);
     }
    }

?>

<div class="container my-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Candidate Form</h1>
            </div>
<h7 style="color:green;">Please fill your details</h7>
<div class="container mt-3" >
  <div class="col-4">
      <?php
      echo"  ";
      ?>
    </div>
<form class="row g-4 " method="POST"     enctype="multipart/form-data" >
    <div class="col-md-4">
    <label for="name" class="form-label">First Name</label>
    <input type="text" class="form-control" name="F_name" id="F_name" placeholder="First Name">
    </div>
    <div class="col-md-4">
    <label for="name" class="form-label">Middle Name</label>
    <input type="text" class="form-control" name="M_name" id="M_name" placeholder="Middle Name">
    </div>
    <div class="col-md-4">
    <label for="name" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="L_name" id="L_name" placeholder="Last Name">
    </div>
    <div class="col-md-4">
    <label for="Gender" class="form-label">Gender</label>
    <select id="Gender" name="Gender" class="form-select">
      <option selected>Choose...</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    </div>
    <div class="col-md-4">
    <label for="Marital_Status" class="Marital_Status">Marital Status</label>
    <select id="Marital_Status" name="Marital_Status" class="form-select">
      <option selected>Choose...</option>
      <option value="unmarried">unmarried</option>
      <option value="married">married</option>
      <option value="other">other</option>
    </select>
    </div>
  <div class="col-md-4">
    <label for="City" class="form-label">City</label>
    <input type="text" class="form-control" name="City" id="City">
  </div>
  <div class="col-md-4">
    <label for="Login_Email" class="form-label">Login Email</label>
    <input type="email" name="Login_Email" class="form-control" id="Login_Email">
  </div>
  <div class="col-md-4">
    <label for="Contact_No" class="form-label">Contact No</label>
    <input type="int" class="form-control" name="Contact_No" id="Contact_No">
  </div>
  <div class="col-md-4">
      <label for="UG Course">UG Course</label>
      <input type="text"  class="form-control" name="UG_Course" id="UG_Course">
  </div>
  <div class="col-md-4">
      <label for="PG Course">PG Course</label>
      <input type="text"  class="form-control" name="PG_Course" id="PG_Course">
  </div>
  <div class="col-md-4">
      <label for="Organization">Organization</label>
      <input type="text" class="form-control" name="Organization" id="Organization">
  </div>
  <div class="col-md-4">
    <label for="College_id" class="form-label">College Id</label>
    <input type="int" class="form-control" name="College_id" id="College_id">
  </div>
  <div class="col-md-4">
      <label for="Designation">Designation</label>
      <input type="text"  class="form-control" name="Designation" id="Designation">
  </div>
  <div class="col-md-4">
        <label for="Notice Period">Notice Period</label>
        <input type="text" class="form-control" name="Notice_Period" id="Notice_Period">
  </div>
  <div class="col-md-4">
        <label for="IT Exp">IT Experience</label>
        <input type="text" class="form-control" name="IT_Exp" id="IT_Exp">
   </div>
   <div class="col-md-4">
        <label for="Total Exp">Total Experience</label>
        <input type="text" class="form-control"  name="Total_Exp" id="Total_Exp">
   </div>

   <div class="col-md-4">
        <label for="Current CTC">Current CTC</label>
        <input type="text" class="form-control" name="Current_CTC" id="Current_CTC">
    </div>

    <div class="col-md-4">
        <label for="Expected CTC">Expected CTC</label>
        <input type="text" class="form-control" name="Expected_CTC" id="Expected_CTC">
    </div>

    <div class="col-md-4">
        <label for="Preferred Location">Preferred Location</label>
        <input type="text" class="form-control" name="Preferred_Location" id="Preferred_Location">
    </div>
       
    <div class="col-md-4">
        <label for="Skill Category">Skill Category</label>
        <input type="text" class="form-control" name="Skill_Category" id="Skill_Category">
    </div>
        
    <div class="col-md-4">
        <label for="Key Skills">Key Skills</label>
        <input type="text" class="form-control" name="Key_Skills" id="Key_Skills">
    </div>
    <div class="col-md-4">
        <label for="Resume Title">Resume Title</label>
        <input type="text" class="form-control" name="Resume_Title" id="Resume_Title">
    </div>
    <div class="col-md-4">
        <label for="Attach Resume">Attach Resume</label>
        <input type="file" class="form-control" name="Attach_Resume" id="Attach_Resume">
    </div>

    <div class="container my-4">
          <div class="card">
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
/* To view uploaded resume you have to copy this code file in one folder (  for eg "candidatedata" ) 
inside htdocs and create one more folder with name candidate_resume(this name should be same) in folder where you have copied 
this code file( for eg "candidatedata" ) then you can see all uploaded file in candidate_resume folder */
?>