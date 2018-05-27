<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SDD Study Hub - Feedback</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		SDD Study Hub
	</header>

	<nav>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="studyGuide.html">Study Guide</a></li>
			<li><a href="quiz.html">Quiz</a></li>
			<li><a href="gallery.html">Gallery</a></li>
			<li style="float:right"><a href="feedback.php">Feedback</a></li>
		</ul>
	</nav>

	<maincontent>
	<h1>Feedback</h1>
	<p>The table below shows feedback from users of this website. You can submit your own comment by filling out the form at the bottom of this page.</p><br>
	<h3>Last 10 Feedback Comments</h3>
		<?php
		$servername = "172.16.2.214";
		$username = "student";
		$password = "password";
		$dbname = "studentdb";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "(SELECT fbId, fbPerson, fbEmail, fbComment FROM feedback ORDER BY fbId DESC LIMIT 10) ORDER BY fbId ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo '<table class="feedback">';
			// Output data of each row
			echo "<tr>";
			echo "<th><b>FeedbackId</b></th>";
			echo "<th><b>Name</b></th>";
			echo "<th><b>Email</b></th>";
			echo "<th><b>Comment</b></th>";
			echo "</tr>";
			
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["fbId"]. "</td>";
				echo "<td>" . $row["fbPerson"] . "</td>";
				echo "<td>" . $row["fbEmail"] . "</td>";
				echo "<td>" . $row["fbComment"] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "0 results";
		}
		$conn->close();
		
		?>
		
		<br>
		<form action="feedbackDone.php" method="post" name="feedbackForm" id="feedbackForm">
			<h3>Leave your feedback here:</h3>
			
			<fieldset>
				<p><b>Name:</b><br>
				<input name="fbName" type="text" id="fbName" size="50" maxlength="100" placeholder="Joe Bloggs" required><br></p>
				<p><b>Email:</b><br>
				<input name="fbEmail" type="email" id="fbEmail" size="50" maxlength="100" placeholder="example@email.com" required>
				</p>
				<p><b>Comment:</b><br>
				<textarea name="fbComment" id="fbComment" maxlength="100" placeholder="Enter your comment here..." required></textarea></p>
				<input class="submitfeedback" type="submit" name="submit" id="submit" value="Submit">
				<input class="submitfeedback" type="reset" name="reset" id="reset" value="Reset">
			</fieldset>
			<!-- <br>
			<table>
				<tbody>
					<tr>
						<td class="feedbackrow">Name*</td>
						<td class="feedbackrow">
							<input name="fbName" type="text" id="fbName" size="50" maxlength="100" required>
						</td>
					</tr>
					<tr>
						<td class="feedbackrow">Email</td>
						<td class="feedbackrow">
							<input name="fbEmail" type="email" id="fbEmail" size="50" maxlength="100">
						</td>
					</tr>
					<tr>
						<td class="feedbackrow">Comment*</td>
						<td class="feedbackrow">
							<textarea name="fbComment" rows="5" cols="50" id="fbComment" maxlength="100" required></textarea>
						</td>
					</tr>
					<tr>
						<td class="feedbackrow"><input class="submitfeedback" type="reset" name="reset" id="reset" value="Reset"></td>
						<td class="feedbackrow"><input class="submitfeedback" type="submit" name="submit" id="submit" value="Submit"></td>
					</tr>
				</tbody>
			</table> -->
		</form>
		
	</maincontent>

	<footer>
		
	</footer>

</body>
</html>
