<?php  include('server.php'); ?>
<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM fixturesdeals WHERE id=$id");

			$n = mysqli_fetch_array($record);
			$opponent = $n['opponent'];
			$location = $n['location'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	<form method="post" action="server.php" >
<?php $results = mysqli_query($db, "SELECT * FROM fixturesdeals"); ?>

<table>
	<thead>
		<tr>
			<th>Opponent</th>
			<th>Location</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['opponent']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="text" name="opponent" value="<?php echo $opponent; ?>">
<input type="text" name="location" value="<?php echo $location; ?>">
		<div class="input-group">
			<label>Opponent</label>
			<input type="text" name="opponent" value="">
		</div>
		<div class="input-group">
			<label>Location</label>
			<input type="text" name="location" value="">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>

		</div>
	</form>
</body>
</html>
