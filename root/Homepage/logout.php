





<?php

	session_destroy();
	unset($_SESSION['username']);
	
    header("location:home1/index.php");

?>

