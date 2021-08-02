<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'owner');

	// initialize variables
	$name = "";
	$designation = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$designation = $_POST['designation'];

		mysqli_query($db, "INSERT INTO ownerstaff (name, designation) VALUES ('$name', '$designation')");
		$_SESSION['message'] = "Saved";
		header('location: index.php');
	}
