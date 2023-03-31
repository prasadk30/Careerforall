<?php
// connecting to the database
$servername = "sql12.freemysqlhosting.net";
$username = "sql12599089";
$password = "qYKI6bwqKS";
$database = "sql12599089";

// //create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
//Die if connection was not successful
if(!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

$sql = "SELECT DISTINCT College_Name FROM College";
$result = mysqli_query($conn, $sql);

?>

<!-- Database connection successful -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript" src="fetchdata.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Candidates Information</title>
  </head>
  <body>

  <div class="container" style="margin-top: 6%; margin-left:8%">
  <table>
    <thead>    
      <th><h4>Select College &nbsp;  </h4></th>  

      <!-- Dropdown code -->
      <th>
      <form action="" method="post">
      <select id="Student" onchange="selectStudent()">
      <option value="">College</option>
      <?php while($row = mysqli_fetch_array($result)){?>
      <option value="<?php echo $row['College_Name'];?>" ><?php echo $row['College_Name'];?></option>
      <?php }?>
      </select>
      </form>  
      </th>
    </thead>
  </table>
  <br>


  <!-- To display fetched data values -->
  <table class="table">
    <thead class="table-dark" style="margin-top: 2rem; border-spacing: 2px; border-width: 2px;">
    <th style=width:30%>Student Name</th>
    <th style=width:30%>Location</th>
    <th style=width:30%>Course</th>
    </thead>

  <tbody id="ans">
  </tbody>
</table>


  </div>
  </body>
</html>