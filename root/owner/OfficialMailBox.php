<?php
require "includes/db_connect.inc.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET["c_code_filter"])){
$sql = "select id, name, designation, mail from mailbox where name like '%".$_GET["c_code_filter"]."%';";

  }
  else{
    $sql = "select id, name, designation, mail from mailbox;";
  }
}


$i = 0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['prev_btn'])){
$i = $_POST['prev_btn'];

}elseif(isset($_POST['next_btn'])){
$i = $_POST['next_btn'];
}
}

$sql = "select id, name, designation, mail from mailbox LIMIT $i,10;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from mailbox;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));


 ?>
  <html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Player Informations</title>
  <link rel="icon" href="icon.ico">
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>
<link rel="icon" href="icon.ico">
<body>
<div align="center" class="main_content">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <div class="course_info">

  <h1>This is the Mail Box page</h1>
 
  <table border="1">
    <thead>
<tr>
  <th> ID</th>
  <th> Name</th>
  <th>Designation</th>
  <th>Mail</th>
</tr>
    </thead>
    <tbody>

 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['designation']; ?></td>
                  <td><?php echo $row['mail']; ?></td>
                </tr>
              <?php } ?>
    </tbody>
  </table>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="pagination_btns" align="center">
      <?php if($i > 0){ ?>
      <button type="submit" name="prev_btn" value="<?php echo ($i-10); ?>"> Previous </button>
    <?php } ?>

    <?php if($i < ($rowCount['total_rows'] - 10)){ ?>
        <button type="submit" name="next_btn" value="<?php echo ($i+10); ?>"> Next </button>
<?php } ?>
</div>
</form>
<a href="owner.php">owner</a>
</div>
</div>
</body>
</html>
