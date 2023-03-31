<!DOCTYPE html>
<html>
<head>
	<title>Display Candidate Name and Locations</title>
</head>
<body>

<div class="d-inline-flex p-2" style="margin-left: 40%;
    margin-top: 3%;">
	<form method="post" action="">
		<label for="College">Select College:</label>
		<select id="College" name="College">
			<?php

			include('dbconnect.php');
			

			// Execute SQL query to retrieve company names
            $sql = "SELECT DISTINCT College_Name FROM College";
			$result = mysqli_query($conn, $sql);

			// Generate drop-down list options
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option value="' . $row['College_Name'] . '">' . $row['College_Name'] . '</option>';
			}

			// Close database connection
			mysqli_close($conn);
			?>
		</select>

		<button type="submit" name="submit">Display Students</button>
	</form>

	<?php
	include('dbconnect.php');
	// Check if form is submitted
	if (isset($_POST['submit'])) {
		

		// Sanitize user input to prevent SQL injection
		$College = mysqli_real_escape_string($conn, $_POST['College']);

		// Execute SQL query to retrieve job descriptions and locations for selected company
		// $sql = "SELECT College_Name,College_Address FROM College where College_Name = '$company'";

		$sql = "SELECT Student_Name,Student_Address,Student_Course FROM Student as S1 INNER JOIN College as C1 ON S1.College_ID=C1.College_id where College_Name = '$College'";

		$result = mysqli_query($conn, $sql);

		// Check if any results were returned
		if (mysqli_num_rows($result) > 0) {
			echo '<table>';
			echo '<tr><th>Student Name</th><th>Student Address</th><th>Student Course</th></tr>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<tr><td>' . $row['Student_Name'] . '</td><td>' . $row['Student_Address'] .'</td><td>'.$row['Student_Course'].'</td></tr>';
			}
			echo '</table>';
		} else {
			echo 'No Students found for selected College.';
		}

		

		}


	
	?>

<!-- <table class="table">
  <thead class="table-dark">
    ...
  </thead>
  <tbody>
    ...
  </tbody>
</table> -->
</div>
</body>
</html>
