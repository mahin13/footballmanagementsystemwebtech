<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'football');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['fitness'];

		mysqli_query($db, "INSERT INTO playerinfo (name, fitness) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Status saved";
		header('location: index.php');
	}

   if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['fitness'];

	mysqli_query($db, "UPDATE playerinfo SET name='$name', fitness='$address' WHERE id=$id");
	$_SESSION['message'] = "Status updated!";
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM playerinfo WHERE id=$id");
	$_SESSION['message'] = "Status deleted!";
	header('location: index.php');
}
