<?php

session_start();
require "includes/db_connect.inc.php";
$msg = "";
include "filter_helper.php";

$i = 0;
$j = 10;

if($_SERVER["REQUEST_METHOD"]=="GET"){
  if(isset($_GET['prev_btn'])){
    $i = $_GET['prev_btn'];
  }elseif(isset($_GET['next_btn'])){
    $i = $_GET['next_btn'];
  }elseif(isset($_GET['pg_btn'])){
    $i = $_GET['pg_btn'];
  }elseif(isset($_GET['perpg_btn'])){
    $_SESSION['per_page'] = $_GET['records_per_page'];
  }elseif(isset($_GET['filter_btn'])){
    filterData($_GET);
  }

  if(isset($_SESSION['per_page'])){
    $j = $_SESSION['per_page'];
  }

  $sql = prepareFilterQueries($_GET, $i, $j);
  $sqlTotalRows = prepareCountFilterQueries($_GET);

}else{
  session_unset();
  session_destroy();

  $sql = "select id, name, weight, task from coachtask LIMIT $i, $j;";
  $sqlTotalRows = "select count(*) as total_rows from coachtask;";
}

$result = mysqli_query($conn, $sql);
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));
$pgNmbr = ceil($rowCount['total_rows']/$j);

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Coach TASK</title>
    <link rel="icon" href="aiub.png">
    <link rel="stylesheet" type="text/css" href="css/style_11.css">
  </head>
  <body>

    <div class="main_content">
      <div class="course_info">
        <h1>Coach Task</h1>
        <h4> page <?php echo (($i/$j)+1); ?> out of <?php echo $pgNmbr; ?> || Total records: <?php echo $rowCount['total_rows']; ?></h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <div class="per_page_control">
            <select name="records_per_page">
              <option value="" disabled selected>Select number of records per page</option>
              <option value="10" <?php if(isset($_GET['records_per_page']) && ($_GET['records_per_page'] == "10")) echo "selected";?>>10</option>
              <option value="50" <?php if(isset($_GET['records_per_page']) && ($_GET['records_per_page'] == "50")) echo "selected";?>>50</option>
              <option value="100" <?php if(isset($_GET['records_per_page']) && ($_GET['records_per_page'] == "100")) echo "selected";?>>100</option>
            </select>
            <button type="submit" name="perpg_btn" value="submit"> Submit </button>
          </div>
          <div class="filtering_parameters">
            <label>Filter by:</label>
            <input type="text" name="c_name_filter" placeholder="name..." value="<?php if(isset($_GET['c_name_filter'])) echo $_GET['c_name_filter']; ?>"> ||
            <select name="credit_filter">
              <option value="" disabled selected>By Credits</option>
              <option value="1" <?php if(isset($_GET['credit_filter']) && ($_GET['credit_filter'] == "1")) echo "selected";?>>1</option>
              <option value="2" <?php if(isset($_GET['credit_filter']) && ($_GET['credit_filter'] == "2")) echo "selected";?>>2</option>
              <option value="3" <?php if(isset($_GET['credit_filter']) && ($_GET['credit_filter'] == "3")) echo "selected";?>>3</option>
            </select>
            ||
            <select name="sort_filter">
              <option value="" disabled selected>Sort records...</option>
              <option value="cn_low_high" <?php if(isset($_GET['sort_filter']) && ($_GET['sort_filter'] == "cn_low_high")) echo "selected";?>>Name A-Z</option>
              <option value="cn_high_low" <?php if(isset($_GET['sort_filter']) && ($_GET['sort_filter'] == "cn_high_low")) echo "selected";?>>Name Z-A</option>
            </select>
            <button type="submit" name="filter_btn" value="submit"> Filter </button>
            <div class="filter_error_msg">
              <?php echo $msg; ?>

            </div>
          </div>
          <table border="1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Task</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['weight']; ?></td>
                  <td><?php echo $row['task']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="pagination_btns" align="center">
            <?php if($i > 0){ ?>
              <button type="submit" name="prev_btn" value="<?php echo ($i-$j); ?>"> Previous </button>
            <?php } ?>

            <?php if($pgNmbr > 1) { for ($p=0; $p<$pgNmbr; $p++) { ?>
              <button type="submit" name="pg_btn" value="<?php echo ($p*$j); ?>"><?php echo ($p+1); ?></button>
            <?php } } ?>

            <?php if($i < ($rowCount['total_rows'] - $j)){ ?>
              <button type="submit" name="next_btn" value="<?php echo ($i+$j); ?>"> Next </button>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
