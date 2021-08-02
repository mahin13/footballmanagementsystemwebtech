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

$sql = "select task from physiotasks LIMIT $i,10;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from physiotasks;";
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
  <h1>Physio Advices</h1>

  <table border="3">
    <thead>
<tr>
  <th>Advices</th>

</tr>
    </thead>
    <tbody>

 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['task']; ?></td>

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

<button><a href="Player.php">Dashbored</a></button>
</div>
</div>
</body>
</html>
