
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>Homepage</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="css/xopixel.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
if (isset($_SESSION['email'])) 
echo "<h1> Welcome <strong>". $_SESSION['email']."</strong> </h1>";
?>

<form action="">
 
	<div class="xop-section">
		<ul class="xop-grid">
			<li>
				<div class="xop-box xop-img-1">
					<a href="../Merch/store.php">
					<div class="xop-info">
						<h3>Merch</h3>
						
					</div></a>
				</div>
			</li>
			<li>
				<div class="xop-box xop-img-2">
					<a href="../Ticket/ticketstore.php">
					<div class="xop-info">
						<h3>Purchase Ticket</h3>
						
					</div></a>
				</div>
			</li>
			<li>
				<div class="xop-box xop-img-3">
					<a href="../Schedule/schedule.php">
					<div class="xop-info">
						<h3>View Schedule</h3>
						
					</div></a>
				</div>
			</li>
            			<li>
				<div class="xop-box xop-img-4">
					<a href="../Player Ratings/playerratings.php">
					<div class="xop-info">
						<h3> View Player Ratings</h3>
						
					</div></a>
				</div>
			</li>
			<li>
				<div class="xop-box xop-img-3">
					<a href="../Gallery/gallery.php">
					<div class="xop-info">
						<h3>LFC Gallery</h3>
						
					</div></a>
				</div>
			</li>
			<li>
				<div class="xop-box xop-img-3">
					<a href="../Index/index.php">
					<div class="xop-info">
						<h3>LogOut</h3>
						
					</div></a>
				</div>
			</li>
		</ul>

		</form>
	</div>
	
</body>
</html>
