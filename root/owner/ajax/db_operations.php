<?php

require "includes/db_connect.inc.php";
$name = "";
$flag_get = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(!empty($_POST['n'])){
    $name = $_POST['n'];
    $sql = "insert into transferlistedplayers (name) values ('$name');";
      $result = mysqli_query($conn, $sql);
    echo "ADDED!<br>";
  }else{
    echo "NOT ADDED!<br>";
  }
}else if($_SERVER["REQUEST_METHOD"]=="GET" && count($_GET)>0){
  $flag_get = 1;
  if(!empty($_GET['n'])){
    $name = $_GET['n'];
    $sql = "select * from  transferlistedplayers where name like '%$name%';";
    $result = mysqli_query($conn, $sql);
  }else{
    $sql = "select * from  transferlistedplayers;";
    $result = mysqli_query($conn, $sql);
  }
}else{
  header("Location: TransferDeals.php");
}

?>



<?php if($flag_get==1){ ?>

  <table align="center" border="1" width="40%">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>

          <td><?php echo $row['name']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

<?php } ?>
