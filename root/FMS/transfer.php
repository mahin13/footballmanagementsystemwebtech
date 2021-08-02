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
  $query="SELECT * FROM transfers where team1='$team'";
  $playersT=getArray($query);
  
  if (isset($_REQUEST['trans'])) {
    $queryy = "UPDATE players SET team='".$_REQUEST['team']."' where id=".$_REQUEST['id']."";
    execute($queryy);
    $query1 = "INSERT into transfers values(null,'".$_REQUEST['name']."','$team','".$_REQUEST['team']."','".Date('d M yy')."')";
    execute($query1);
    echo "<script>alert('Player transferred Successfully');</script>";
    echo "<script>window.location.replace('transfer.php');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Player Transfer</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>

  <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Players List transferred from <b><?php echo $user[0]['team']; ?></b></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>TRANSFERRED FROM</th><th>TRANSFERRED TO</th><th>DATE</th></tr>
          <?php
          foreach ($playersT as $dt) {
            echo '<tr><td>'.$dt['player'].'</td><td>'.$dt['team1'].'</td><td>'.$dt['team2'].'</td><td>'.$dt['date'].'</td></tr>';}?>   
        </table>
        <center><br><br><br><h2>TRANSFER A PLAYER <small>from <b><?php echo $user[0]['team']; ?></b></small></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>PLAYER RATING / RANK</th><th>TEAM</th><th>TRANSFER TO</th></tr>
          <?php
          foreach ($players as $dt) {
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['rate'].'</td><td>'.$dt['team'].'</td><td><form action="" method="post"><select name="team" class="field" required>
              <option value="Barcelona"> Select a Team </option>
              <option value="Barcelona"> Barcelona </option>
              <option value="Real Madrid"> Real Madrid </option>
              <option value="Manchester United"> Manchester United </option>
              <option value="Chelsea"> Chelsea </option>
              <option value="Bayern Munich"> Bayern Munich </option>
              <option value="Arsenal FC"> Arsenal FC </option>
              <option value="Paris Saint Germania"> Paris Saint Germania </option>
              <option value="Juventus"> Juventus </option>
           </select><input type="hidden" name="id" value="'.$dt['id'].'"><input type="hidden" name="name" value="'.$dt['name'].'"><input type="submit" name="trans" value=" TRANSFER "></form></td></tr>';}?>
        </table>
      </div>
    </div>

  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>