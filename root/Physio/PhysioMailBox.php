<?php
require "includes/db_connect.inc.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET["c_code_filter"])){
$sql = "select id, name, designation,mail from mailbox where name like '%".$_GET["c_code_filter"]."%';";

  }
  else{
    $sql = "select id, name, designation,mail from mailbox;";
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

$sql = "select id, name, designation,mail from mailbox ;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from mailbox;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));


 ?>
  <html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Player Informations</title>
  <link rel="icon" href="icon.ico">
  <link rel="stylesheet" type="text/css" href="css/style_1.css">
</head>
<link rel="icon" href="icon.ico">
<body>
<div align="center" class="main_content">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <div class="course_info">

  <h1>Mail Box</h1>
  <div class="filtering_parameters">

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

</div>
</form>
<button><a href="Physio.php">Dashboard</a></button>
</div>
</div>
</body>
</html>
