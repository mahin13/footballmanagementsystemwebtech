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
  $query="SELECT * FROM mails where sender='".$_SESSION['un']."' or receiver='".$_SESSION['un']."'";
  $mails=getArray($query);
  $query="SELECT * FROM users where type='coach'";
  $coaches=getArray($query);
  
  if (isset($_REQUEST['send'])) {
      if ($_REQUEST['receiver']=='') {
        echo "<script>alert('Please select a email receiver, mail has not been sent.');</script>";
        echo "<script>window.location.replace('mail.php');</script>";
      } else if ($_REQUEST['receiver']==$_SESSION['un']) {
        echo "<script>alert('Please select a valid receiver, mail has not been sent.');</script>";
        echo "<script>window.location.replace('mail.php');</script>";
      }else{
        $query = "INSERT into mails values(null,'".$_REQUEST['msg']."','".$_SESSION['un']."','".$_REQUEST['receiver']."','".Date('yy-m-d h:i')." PM"."')";
        execute($query);
        echo "<script>alert('Mail has been sent');</script>";
        echo "<script>window.location.replace('mail.php');</script>";
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
    <title>Mails</title>
</head>
<body>
    <?php include('header.php'); ?><br><br>
    <div class="my-body">
       <?php if (isset($_SESSION['un'])) {
          echo '<h3><small>Welcome coach, </small> '.$_SESSION['un'].' <small> <a href="dealer.php?logout=1"> &nbsp &nbsp &nbsp  Logout</a></small></h3><br><br><p></p>';
        } ?>
    <div class="row">
      <div class="body-stress">
        <center><h2>Emails</h2></center>
        <table class="tab-body">
          <tr><th>SENDER</th><th>RECEIVER</th><th>MESSAGE</th></tr>
          <?php
          foreach ($mails as $dt) {
            echo '<tr><td class="td-data-1">'.$dt['sender'].'</td><td class="td-data-1">'.$dt['receiver'].'</td><td class="td-data">'.$dt['msg'].'<br><p class="tilt">'.$dt['time'].'</p><span class="field"><a href="dealer.php?delMSG='.$dt['id'].'"> DELETE </a></span></td></tr>';}?>   
        </table>
        <center><br><br><br><h2>SEND A MAIL</h2></center>
        <table class="tab-body">
          <tr><th>SENDER</th><th>RECEIVER</th><th>MESSAGE</th></tr>
          <tr>
            <form action="" method="post">
              <td><?php echo $_SESSION['un']; ?></td>
              <td><select name="receiver" class="field">
                <option value="">Select a receiver</option>
                <?php
                foreach ($coaches as $dt) {
                    echo '<option value="'.$dt['uname'].'">'.$dt['uname'].'</option>';
                }
                ?>
              </select></td>
              <td>
              <textarea class="field" style="height:80px;" name="msg" required></textarea></td>
           <td><input type="submit" name="send" class="field-btn" value=" SEND "></td>
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