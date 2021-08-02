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
  $query="SELECT * FROM socials order by date desc";
  $socials=getArray($query);
  $query="SELECT * FROM players";
  $players=getArray($query);
  
  if (isset($_REQUEST['addEvent'])) {
    $query = "INSERT into socials values(null,'".$_REQUEST['name']."','".$_REQUEST['player']."','".$_REQUEST['place']."','".$_REQUEST['date']."')";
    execute($query);
    echo "<script>alert('Event Added');</script>";
    echo "<script>window.location.replace('social.php');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Players Social Events</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>
<div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome receptionist, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>SOCIAL EVENTS OF PLAYERS</h2></center>
        <table class="tab-body">
          <tr><th>EVENT NAME</th><th>PLAYER</th><th>PLACE</th><th>DATE</th></tr>
          <?php
          foreach ($socials as $dt) {
            echo '<tr><td>&nbsp</td></tr>';
            echo '<tr><td>'.$dt['name'].'</td><td>'.$dt['player'].'</td><td>'.$dt['place'].'</td><td>'.$dt['date'].'</td><td><span class="field"><a href="dealer.php?delEvent='.$dt['id'].'"> &times; </a></span></td></tr>';}?>   
          <tr><td>&nbsp</td></tr>
          <tr><td><b><i> ADD AN EVENT </i></b></td></tr>
          <tr>
            <form action="" method="post">
              <td><input type="text" name="name" class="field" placeholder="Enter Event Name" required></td>
              <td><select name="player" class="field">
                <?php
                foreach ($players as $dt) {
                    echo '<option value="'.$dt['name'].'">'.$dt['name'].'</option>'; 
                }
                ?>
              </select></td>
              <td><input type="text" name="place" class="field" placeholder="Enter Event Place" required></td>
              <td><input type="date" name="date" class="field" required></td>
           <td><input type="submit" name="addEvent" class="" value=" ADD "></td>
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