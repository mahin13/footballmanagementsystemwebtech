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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Receptionist</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>
    <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome receptionist, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
  </div>

  <div class="container">
    
  <div class="row">
    <div class="col-md-6">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="fan.jfif">
      <div class="card-block">
        <h4 class="card-title">Fan's Details</h4>
        <a href="fan.php" class="btn btn-primary">View</a>
    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card card-inverse card-primary text-center"style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="team.jfif" alt="Card image cap">
      <div class="card-block">
        <h4 class="card-title">Player's Activities</h4>
        <a href="social.php" class="btn btn-primary">View</a>
    </div>
    </div>
</div>

</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>