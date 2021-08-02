<?php

session_start();

require "includes/db_connect.inc.php";

$sql_desc_extension = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){

  if(isset($_GET['sort_records']) && ($_GET['sort_records'] == "c_name_desc")) {
    $sql_desc_extension = "desc";
  }

  if(!empty($_GET['c_code_filter']) && !empty($_GET['sort_records'])){

    $sql = "select id, name, position, injury from physioinjury
    where id like '%".$_GET['c_code_filter']."%'
    order by name $sql_desc_extension;";

  }elseif(empty($_GET['c_code_filter']) && !empty($_GET['sort_records'])){

    $sql = "select id, name, position, injury from  physioinjury order by name $sql_desc_extension;";

  }elseif(!empty($_GET['c_code_filter']) && empty($_GET['sort_records'])){
    $sql = "select id, name, position, injury from  physioinjury
    where position like '%".$_GET['c_code_filter']."%';";
  }else{
    $sql = "select id, name, position, injury  from  physioinjury;";
  }
}else{
  $sql = "select id, name, position, injury  from  physioinjury;";
}

$result = mysqli_query($conn, $sql);

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Injury Status</title>
    <link rel="icon" href="icon.ico">
    <link rel="stylesheet" type="text/css" href="css/style_11.css">
  </head>
  <body>
    <div class="main_content" align="center">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <h1>Injury Status</h1>
        <div class="filtering_parameters">
          <label>Search By</label>
          <input type="text" placeholder="Position...." name="c_code_filter" value=""> ||
          <button type="submit" name="button">Search</button>
          <select name="sort_records">
            <option value="">Sort records...</option>
            <option value="c_name_asc"> Name by A-Z</option>
            <option value="c_name_desc">Name by Z-A</option>
          </select>

        </div>
        <table border="1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Position</th>
              <th>Injury</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['injury']; ?></td>
              </tr>

            <?php } ?>
          </tbody>
        </table>
        <button><a href="InjuryUpdateinfo">Click Here to Update Injury status</a></button>
        <button><a href="Physio.php">Dashboard</a></button>
      </form>
    </div>
  </body>
</html>
