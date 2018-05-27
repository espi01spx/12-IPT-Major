<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SDD Study Hub - Feedback</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<maincontent>
	<?php
	include 'redirect.php';

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

	$fbPerson = $_POST["fbName"];
	$fbEmail = $_POST["fbEmail"];
	$fbComment = $_POST["fbComment"];

	$sql = "INSERT INTO feedback (fbPerson, fbEmail, fbComment) VALUES ('".$fbPerson."', '".$fbEmail."', '".$fbComment."')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	}
	else {
		echo "Error: " .$sql."<br>".$conn->error;
	}
	
	$conn->close();
	
	$url = "feedback.php";
	redirect($url);

	?>
</maincontent>

</body>
</html>
