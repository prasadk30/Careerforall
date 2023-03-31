<?php
// connecting to the database
$servername = "sql12.freemysqlhosting.net";
$username = "sql12599089";
$password = "qYKI6bwqKS";
$database = "sql12599089";


    global $k;
    $k = $_REQUEST["id"];
    $k = trim($k);
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT Student_Name,Student_Address,Student_Course FROM Student as S1 INNER JOIN College as C1 ON S1.College_ID=C1.College_id where College_Name = '$k'";
    $result = mysqli_query($conn, $sql);
    

    while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['Student_Name'];?></td>
            <td><?php echo $row['Student_Address'];?></td>
            <td><?php echo $row['Student_Course'];?></td>
        </tr>

    <?php }



?>