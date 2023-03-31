<!DOCTYPE html>
<html>
<head>
	<title>Display Job Descriptions and Locations</title>
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php require 'partials/_nav.php' ?>

	<div class="container mt-3">
		<form method="post" action="">
			<div class="form-group">
				<label for="Company_Name">Select a company:</label>
				<select  name="Company_Name" class="form-control" onchange="this.form.submit()">
					<option value="">Select a company</option>
					<?php
					include 'partials/_dbconnect.php';

					// Execute SQL query to retrieve company names
					$query ="SELECT Startup_id ,Company_Name FROM Startup";
					$result = $conn->query($query);

					// Generate drop-down list options
					while ($row = mysqli_fetch_assoc($result)) {
						$selected = (isset($_POST['Company_Name']) && $_POST['Company_Name'] == $row['Company_Name']) ? 'selected' : '';
						echo '<option value="' . $row['Company_Name'] . '" '.$selected.'>' . $row['Company_Name'] . '</option>';
					}

				
					?>
				</select>
			</div>
		</form>

		<?php
		if (isset($_POST['Company_Name'])) {
			include 'partials/_dbconnect.php';

			// Sanitize user input to prevent SQL injection
			$company = mysqli_real_escape_string($conn, $_POST['Company_Name']);

			// Execute SQL query to retrieve job descriptions and locations for selected company
			$sql = "SELECT JD_Description, Job_Location FROM Jobdescriptions WHERE Company_ID IN (SELECT Startup_id FROM Startup WHERE Company_Name = '$company')";
			$result = mysqli_query($conn, $sql);

			// Check if any results were returned
			if (mysqli_num_rows($result) > 0) {
				echo '<table class="table mt-3">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Job Description</th>';
				echo '<th>Location</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row['JD_Description'] . '</td>';
					echo '<td>' . $row['Job_Location'] . '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<div class="alert alert-warning mt-3">No job descriptions or locations found for selected company.</div>';
			}

			// Close database connection
			mysqli_close($conn);
		}
		?>
	</div>

	<!-- Add Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
