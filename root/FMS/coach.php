<?php
  session_start();
  require_once 'db_connect.php';
  $msg = "";
    if (!isset($_SESSION['un'])) {
      header('location: dealer.php?logout=1');
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>Coach Home</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>

<div class="container">
    <div class="row">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].'</h3><br><br><p><a href="dealer.php?logout=1">Logout</a></p>';
        } ?>
    </div>
  <div class="row">
    <div class="col-md-6">
    <a href="fan.html">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="update.jpg" style="width: 100% ; height: 85%;">
      <div class="card-block">
        <h4 class="card-title"><a href="transfer.php">PLAYER TRANSFER</a></h4>
        
    </div>
    </div>
    </a>
</div>

<div class="col-md-6">
    <a href="#">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="update.jpg" style="width: 100% ; height: 85%;">
      <div class="card-block">
        <h4 class="card-title" ><a href="formation.php"> TEAM FORMATION </a></h4>
        
    </div>
    </div>
    </a>
</div>

</div>

<div class="container">
    
  <div class="row">
    <div class="col-md-6">
    <a href="#">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="update.jpg" style="width: 100% ; height: 85%;">
      <div class="card-block">
        <h4 class="card-title"><a href="player.php">TEAM PLAYER</a></h4>
        
    </div>
    </div>
    </a>
</div>

<div class="col-md-6">
    <a href="#">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="update.jpg" style="width: 100% ; height: 85%;">
      <div class="card-block">
        <h4 class="card-title" ><a href="match.php">MATCH</a></h4>
        
    </div>
    </div>
    </a>
</div>

</div>
    </div><!-- ./container -->
    <div class="container">
    
  <div class="row">
</div>

<div class="col-md-6">
    <a href="#">
    <div class="card card-inverse card-primary text-center" style="width: 100% ; height: 80%;">
      <img class="card-img-top" src="update.jpg" style="width: 100% ; height: 85%;">
      <div class="card-block">
        <h4 class="card-title" ><a href="mail.php">MAIL</a></h4>
        
    </div>
    </div>
    </a>
</div>

</div>
    </div><!-- ./container -->
    <div style="margin-top:500px;"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>