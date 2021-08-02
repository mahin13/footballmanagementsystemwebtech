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
  $query="SELECT * FROM teams where team='$team'";
  $playerF=getArray($query);
  
  if (isset($_REQUEST['positioner'])) {
    if ($_REQUEST['position']=='General') {
      $query = "UPDATE teams SET position='General' where team='$team' and player='".$_REQUEST['player']."'";
      execute($query);
      echo "<script>alert('Position Successfully Changed');</script>";
      echo "<script>window.location.replace('formation.php');</script>";
    }else{
      $query="SELECT * FROM teams where team='$team' and position='".$_REQUEST['position']."'";
      $pos=getArray($query);
      if ($pos==null) {
        $query = "UPDATE teams SET position='".$_REQUEST['position']."' where team='$team' and player='".$_REQUEST['player']."'";
        execute($query);
        echo "<script>alert('Position Successfully Changed');</script>";
        echo "<script>window.location.replace('formation.php');</script>";
      }else{
        $query = "UPDATE teams SET position='General' where team='$team' and player='".$pos[0]['player']."'";
        execute($query);
        $queryy = "UPDATE teams SET position='".$_REQUEST['position']."' where team='$team' and player='".$_REQUEST['player']."'";
        execute($queryy);
        echo "<script>alert('Position Successfully Changed');</script>";
        echo "<script>window.location.replace('formation.php');</script>";
      }
    }

    
  }
  if (isset($_REQUEST['addP'])) {
    $query = "INSERT into players values(null,'".$_REQUEST['name']."',".$_REQUEST['rate'].",'".$_REQUEST['team']."')";
    execute($query);
    $queryy = "INSERT into teams values(null,'".$_REQUEST['team']."',".$_REQUEST['name'].",'General')";
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
    <title>Team Formation</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>
  <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Team Formation <small>(of <b><?php echo $user[0]['team']; ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>POSITION</th><th>CHANGE POSITION TO</th></tr>
          <?php
          foreach ($playerF as $dt) {
            echo '<tr><td class="td-data-1">'.$dt['player'].'</td><td class="td-data-1">'.$dt['position'].'</td><td><form action="" method="post"><select name="position" class="field" style="width:150px;">
            <option value="GoalKeeper">GoalKeeper</option>
            <option value="Right Fullback">Right Fullback</option>
            <option value="Left Fullback">Left Fullback</option>
            <option value="Center Back">Center Back</option>
            <option value="Sweeper">Sweeper</option>
            <option value="Defending Midfielder">Defending Midfielder</option>
            <option value="Right Midfielder">Right Midfielder</option>
            <option value="Center Midfielder">Center Midfielder</option>
            <option value="Forward Striker">Forward Striker</option>
            <option value="Attacking Midfielder">Attacking Midfielder</option>
            <option value="Left Midfielder">Left Midfielder</option>
            <option value="General">General</option>
            </select><input type="hidden" name="player" value="'.$dt['player'].'"><input type="submit" class="field-btn" style="width:100px;" name="positioner" value=" Change "></form></td></tr>';}?>   
        </table>
      </div>
    </div>

  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>