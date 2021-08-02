<?php
  session_start();
  require_once 'db_connect.php';
  $msg = "";
    if (!isset($_REQUEST['src'])) {
      echo "<script>alert('Bad Entry');</script>";
    }else{
        $query="SELECT * FROM players where name like '%".$_REQUEST['src']."%'";
        $players=getArray($query);
        $query="SELECT * FROM teams where team like '%".$_REQUEST['src']."%'";
        $teams=getArray($query);
        $query="SELECT * FROM socials where name like '%".$_REQUEST['src']."%'";
        $socials=getArray($query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Search Results</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>
<div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome receptionist, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        }else{
          echo '<h3>Search Results</h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Players <small>(Number of results: <b><?php echo count($players); ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>PLAYER NAME</th><th>PLAYER RATING / RANK</th><th>TEAM</th></tr>
          <?php
          foreach ($players as $dt) {
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['rate'].'</td><td>'.$dt['team'].'</td></tr>';}?>   
        </table>
        <center><h2>Teams <small>(Number of results: <b><?php echo count($teams); ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>TEAM NAME</th><th>PLAYER NAME</th><th>PLAYER POSITION</th></tr>
          <?php
          foreach ($teams as $dt) {
            echo '<tr><td>'.$dt['team'].'</td><td>'.$dt['player'].'</td><td>'.$dt['position'].'</td></tr>';}?>   
        </table>
        <center><h2>Social Events <small>(Number of results: <b><?php echo count($socials); ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>EVENT NAME</th><th>PLAYER</th><th>PLACE</th><th>DATE</th></tr>
          <?php
          foreach ($socials as $dt) {
            echo '<tr><td>&nbsp</td></tr>';
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['player'].'</td><td>'.$dt['place'].'</td><td>'.$dt['date'].'</td></tr>';}?>   
          <tr><td>&nbsp</td></tr>
        </table>
      </div>
    </div>

  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>