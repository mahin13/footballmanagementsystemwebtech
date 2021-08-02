<?php
  session_start();
  require_once 'db_connect.php';
  $msg = "";
    if (!isset($_SESSION['un'])) {
      header('location: dealer.php?logout=1');
    }
  $query="SELECT * FROM users where id=".$_SESSION['id'];
  $user=getArray($query);
  $team = $user[0]['team'];
  $query="SELECT * FROM players where team='$team'";
  $players=getArray($query);
  
  if (isset($_REQUEST['rater'])) {
    $query = "UPDATE players SET rate=".$_REQUEST['rate']." where id=".$_REQUEST['id']."";
    execute($query);
    echo "<script>alert('Rate Changed Successfully');</script>";
    echo "<script>window.location.replace('player.php');</script>";
  }
  if (isset($_REQUEST['addP'])) {
    $query = "INSERT into players values(null,'".$_REQUEST['name']."',".$_REQUEST['rate'].",'".$_REQUEST['team']."')";
    execute($query);
    $queryy = "INSERT into teams values(null,'".$_REQUEST['team']."','".$_REQUEST['name']."','General')";
    execute($queryy);
    echo "<script>alert('New Player Added');</script>";
    echo "<script>window.location.replace('player.php');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Player List</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>


    



  <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Players List <small>(Players from your team <b><?php echo $user[0]['team']; ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>PLAYER RATING / RANK</th><th>TEAM</th><th>CHANGE RATE</th><th>DELETE</th></tr>
          <?php
          foreach ($players as $dt) {
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['rate'].'</td><td>'.$dt['team'].'</td><td><form action="" method="post"><select name="rate" class="field"><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option></select><input type="hidden" name="id" value="'.$dt['id'].'"><input type="submit" name="rater" value=" Change "></form></td><td><span class="field"><a href="dealer.php?delPlayer='.$dt['id'].'"> DELETE </a></span></td></tr>';}?>   
        </table>
        <center><br><br><br><h2>ADD NEW PLAYER <small>to <b><?php echo $user[0]['team']; ?></b></small></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>PLAYER RATING / RANK</th><th>TEAM</th></tr>
          <tr>
            <form action="" method="post">
              <td><input type="text" name="name" class="field" placeholder="Enter Player Name" required></td>
              <td><select name="rate" class="field"><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option></select></td>
              <td>
              <input type="hidden" name="team" value="<?php echo $team; ?>">
              <?php echo 'New player of <b>'.$team.'</b>'; ?></td>
           <td><input type="submit" name="addP" class="field-btn" value=" ADD "></td>
            </form>
          </tr>
        </table>
      </div>
    </div>

  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>