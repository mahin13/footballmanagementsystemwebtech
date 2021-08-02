<?php
session_start();
require "includes/db_connect.inc.php";

$sql_desc_extension = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET["c_code_filter"])){
$sql = "select id, name, designation, joiningtime from ownerstaff where id like '%".$_GET["c_code_filter"]."%';";

  }
  else{
    $sql = "select id, name, designation, joiningtime from ownerstaff;";
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

$sql = "select id, name, designation, joiningtime from ownerstaff ;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from ownerstaff;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));


 ?>
  <html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Player Informations</title>
  <link rel="icon" href="icon.ico">
  <link rel="stylesheet" type="text/css" href="style_1.css">

</head>
<body>
<div align="center" class="main_content">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <div class="course_info">


  <table border="1">
    <thead>
<tr>
  <th> ID</th>
  <th> Name</th>
  <th>Designation</th>
  <th>JOINING TIME</th>
</tr>
    </thead>
    <tbody>

 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['designation']; ?></td>
                  <td><?php echo $row['joiningtime']; ?></td>
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
<a href="owner.php">Owner</a>
<button><a href="Insertion">INSERT HERE</a></button>
</div>
</div>
</body>
</html>
