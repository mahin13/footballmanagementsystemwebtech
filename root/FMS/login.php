<?php
  session_start();
  require_once 'db_connect.php';
  $msg = "";

  $query="SELECT * FROM teams";
  $teams=getArray($query);
  
  if (isset($_REQUEST['reg'])) {
    $query = "INSERT INTO users VALUES(NULL,'".$_REQUEST['uname']."','".$_REQUEST['password']."','".$_REQUEST['team']."','".$_REQUEST['type']."')";
    execute($query);
    $_SESSION["msg"] = "Registration Successfully Completed!";
    $msg = "Registration Successfully Completed!";
    echo "<script>alert('Registration Successfully Completed!');</script>";
    echo "<script>window.location.replace('login.php');</script>";
  }
  if (isset($_REQUEST['login'])) {
    $query="SELECT * FROM users WHERE uname='".$_REQUEST['uname']."' and password='".$_REQUEST['password']."'";
    $user=getArray($query);

    if ($user!=null) {
      $_SESSION["id"] = $user[0]['id'];
      $_SESSION["un"] = $user[0]['uname'];
      $_SESSION["type"] = $user[0]['type'];
      if ($user[0]['type']=='coach') {
        header('location:coach.php');
      }else{
        header('location:receptionist.php');
      }
    }else{
      echo "<script>alert('Invalid Credential');</script>";
      echo "<script>window.location.replace('login.php');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('links.php'); ?>
    <title>login</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>

<div class="container">
    
  <div class="row">
  </div>
  <div class="row">
    <div class="col-sm-6">
      <h3>Login</h3>
      <form action="" method="post">
        <input type="text" name="uname" class="field" placeholder="Enter your username" required>
          <input type="password" name="password" class="field" placeholder="Enter your password" required>
           <input type="submit" name="login" class="field-btn" value="login">
      </form>
    </div>
    <div class="col-sm-6">
      <h3>Registration</h3>
      <form action="" method="post">
        <input type="text" name="uname" class="field" placeholder="Enter new username" required>
          <input type="password" name="password" class="field" placeholder="Enter new password" required>
           <select name="team" class="field" required>
              <option value="Barcelona"> Select a Team </option>
              <option value="Barcelona"> Barcelona </option>
              <option value="Real Madrid"> Real Madrid </option>
              <option value="Manchester United"> Manchester United </option>
              <option value="Chelsea"> Chelsea </option>
              <option value="Bayern Munich"> Bayern Munich </option>
              <option value="Arsenal FC"> Arsenal FC </option>
              <option value="Paris Saint Germania"> Paris Saint Germania </option>
              <option value="Juventus"> Juventus </option>
           </select>
           <select name="type" class="field" required>
              <option value="coach" selected> Select account type </option>
              <option value="coach"> Coach </option>
              <option value="receptionist"> Receptionist </option>
           </select>
           <input type="submit" name="reg" class="field-btn" value="Register New Account">
      </form>
    </div>
  </div>
  <div class="row">
    
  </div>

</div><!-- ./container -->
    <div style="margin-top:500px;"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
