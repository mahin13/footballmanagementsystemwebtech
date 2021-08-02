<?php
require "includes/db_connect.inc.php";

$i = 0;
$j = 10;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['prev_btn'])){
$i = $_POST['prev_btn'];

}elseif(isset($_POST['next_btn'])){
$i = $_POST['next_btn'];
}

elseif(isset($_POST['pg_btn'])){
$i = $_POST['pg_btn'];
}
elseif(isset($_POST['perpg_btn'])){
$_SESSION['per_page'] = $_POST['records_per_page'];
}
if(isset($_SESSION['per_page'])){
      $j = $_SESSION['per_page'];
}
}else{
 session_unset();

}




$sql = "select matchid, opponent, location,date from playerfixtures LIMIT $i,$j;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from playerfixtures;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));
$pgNmbr = ceil($rowCount['total_rows']/$j);


 ?>
  <html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Fixtures</title>
  <link rel="icon" href="icon.ico">
  <link rel="stylesheet" type="text/css" href="css/style_2.css">
  <link rel="icon" href="icon.ico">
</head>

<body>
  <div class="main_content">
    <div class="course_info">

  <h1>This is the Fixture page</h1>

      <h4> page <?php echo (($i/$j)+1); ?> out of <?php echo $pgNmbr; ?></h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <select name="records_per_page">
      <option value="" disabled selected>Select number of records per page</option>
      <option value="10" <?php if(isset($_POST['record_per_page']) && ($_POST['record_per_page']=="10")) echo "selected";?>>10</option>
      <option value="50" <?php if(isset($_POST['record_per_page']) && ($_POST['record_per_page']=="50")) echo "selected";?>>50</option>
      <option value="100" <?php if(isset($_POST['record_per_page']) && ($_POST['record_per_page']=="100")) echo "selected";?>>100</option>
      </select>
      <button type="submit" name="perpg_btn" value="submit">Submit</button>
  <table border="1">
    <thead>
<tr>
  <th> ID</th>
  <th> Opponent</th>
  <th>Location</th>
  <th>Date</th>
</tr>
    </thead>
    <tbody>

 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['matchid']; ?></td>
                  <td><?php echo $row['opponent']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                </tr>
              <?php } ?>
    </tbody>
  </table>

    <div class="pagination_btns" align="center">
      <?php if($i > 0){ ?>
      <button type="submit" name="prev_btn" value="<?php echo ($i-$j); ?>"> Previous </button>
    <?php } ?>
      <?php if($pgNmbr > 1) { for ($p=0; $p<$pgNmbr; $p++){ ?>
        <button type="submit" name="pg_btn" value="<?php echo ($p*$j); ?>"><?php echo ($p+1); ?></button>
    <?php } } ?>


    <?php if($i < ($rowCount['total_rows'] - $j)){ ?>
        <button type="submit" name="next_btn" value="<?php echo ($i+$j); ?>"> Next </button>
<?php } ?>
</div>
</form>
<button><a href="Player.php">Dashbored</a></button>
</div>
</div>
</body>
</html>
