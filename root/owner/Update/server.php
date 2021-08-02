<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'owner');

	// initialize variables
	$opponent = "";
	$location = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$opponent = $_POST['name'];
		$location = $_POST['address'];

		mysqli_query($db, "INSERT INTO fixturesdeals (opponent, location) VALUES ('$opponent', '$location')");
		$_SESSION['message'] = "Saved";
		header('location: index.php');
	}

   if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$opponent = $_POST['opponent'];
	$location = $_POST['location'];

	mysqli_query($db, "UPDATE fixturesdeals SET opponent='$opponent', location='$location' WHERE id=$id");
	$_SESSION['message'] = "Updated!";
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM fixturesdeals WHERE id=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: index.php');
}
