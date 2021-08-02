<?php
require "includes/db_connect.inc.php";

$i = 0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['prev_btn'])){
$i = $_POST['prev_btn'];

}elseif(isset($_POST['next_btn'])){
$i = $_POST['next_btn'];
}
}

$sql = "select id, name, postion, fitness, injuries, rating from playerinfo LIMIT $i,10;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from playerinfo;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));


 ?>
  <html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Player Informations</title>
  <link rel="icon" href="icon.ico">
  <link rel="stylesheet" type="text/css" href="css/style_1.css">
</head>
<body>
<div align="center" class="main_content">
  <div class="playerinfo">
  <h1>This is the Player Information page</h1>
  <button><a href="PhysioTask.php">Click Here to give Task to player</a></button>
  <table border="3">
    <thead>
<tr>
  <th>Player ID</th>
  <th>Player Name</th>
  <th>Position</th>
  <th>Fitness</th>
  <th>Injuries</th>
  <th>Rating</th>
</tr>
    </thead>
    <tbody>

 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['postion']; ?></td>
                  <td><?php echo $row['fitness']; ?></td>
                  <td><?php echo $row['injuries']; ?></td>
                  <td><?php echo $row['rating']; ?></td>
                </tr>
              <?php } ?>
    </tbody>
  </table>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="pagination_btns">
      <?php if($i > 0){ ?>
      <button type="submit" name="prev_btn" value="<?php echo ($i-10); ?>"> Previous </button>
    <?php } ?>

    <?php if($i < ($rowCount['total_rows'] - 10)){ ?>
        <button type="submit" name="next_btn" value="<?php echo ($i+10); ?>"> Next </button>
<?php } ?>
</div>
</form>
  <button><a href="Playerinfoupdate">Click Here to Update Player fitness Information</a></button>
<button><a href="Physio.php">Dashbored</a></button>
</div>
</div>
</body>
</html>
