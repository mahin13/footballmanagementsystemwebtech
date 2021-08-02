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
  $query="SELECT * FROM matches where team1='$team' or team2='$team' order by date desc";
  $matches=getArray($query);
  $query="SELECT * FROM matches order by date desc";
  $matches2=getArray($query);
  
  if (isset($_REQUEST['addMatch'])) {
    $query = "INSERT into matches values(null,'".$_REQUEST['name']."','$team','".$_REQUEST['team2']."','".$_REQUEST['place']."','".$_REQUEST['date']."')";
    execute($query);
    echo "<script>alert('New Match Assigned');</script>";
    echo "<script>window.location.replace('match.php');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Matches</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>

  <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Matches List <small>(of <b><?php echo $user[0]['team']; ?></b>)</small></h2></center>
        <table class="tab-body">
          <tr><th>MATCH NAME</th><th>TEAM 1</th><th>TEAM 2</th><th>PLACE</th><th>DATE</th></tr>
          <?php
          foreach ($matches as $dt) {
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['team1'].'</td><td>'.$dt['team2'].'</td><td>'.$dt['place'].'</td><td>'.$dt['date'].'</td></tr>';}?>
        </table>
        <center><br><br><br><h2>Matches List <small>( WORLDWIDE )</small></h2></center>
        <table class="tab-body">
          <tr><th>MATCH NAME</th><th>TEAM 1</th><th>TEAM 2</th><th>PLACE</th><th>DATE</th></tr>
          <?php
          foreach ($matches2 as $dt) {
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['team1'].'</td><td>'.$dt['team2'].'</td><td>'.$dt['place'].'</td><td>'.$dt['date'].'</td></tr>';}?>
        </table>
        <center><br><br><br><h2>ASSIGN NEW MATCH <small>to <b><?php echo $user[0]['team']; ?></b></small></h2></center>
        <table class="tab-body">
          <tr><th>MATCH NAME</th><th>TEAM </th><th>TEAM WITH</th><th>PLACE</th><th>DATE</th></tr>
          <tr>
            <form action="" method="post">
              <td><input type="text" name="name" class="field" placeholder="Enter Match Name" required></td>
              <td><?php echo 'New Match of <b>'.$team.'</b>'; ?></td>
              <td>
              <select name="team2" class="field" required>
              <option value="Barcelona"> Select a Team </option>
              <option value="Barcelona"> Barcelona </option>
              <option value="Real Madrid"> Real Madrid </option>
              <option value="Manchester United"> Manchester United </option>
              <option value="Chelsea"> Chelsea </option>
              <option value="Bayern Munich"> Bayern Munich </option>
              <option value="Arsenal FC"> Arsenal FC </option>
              <option value="Paris Saint Germania"> Paris Saint Germania </option>
              <option value="Juventus"> Juventus </option>
           </select></td>
            <td><input type="text" name="place" class="field" placeholder="Enter Venue/Location" required></td>
            <td><input type="date" name="date" class="field" required></td>
           <td><input type="submit" name="addMatch" class="" value=" OK "></td>
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