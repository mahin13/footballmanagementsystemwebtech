<?php  include('server.php'); ?>
<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM playerinfo WHERE id=$id");

			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['fitness'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
<link rel="stylesheet" type="text/css" href="stylepl.css">
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
<?php $results = mysqli_query($db, "SELECT * FROM playerinfo"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Fitness</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['fitness']; ?></td>
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
<input type="text" name="name" value="<?php echo $name; ?>">
<input type="text" name="fitness" value="<?php echo $address; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Fitness</label>
			<input type="text" name="address" value="">
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
