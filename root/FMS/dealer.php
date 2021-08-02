<?php
session_start();
  require_once 'db_connect.php';

  if (isset($_REQUEST['logout'])) {
    unset($_SESSION['id']);
    unset($_SESSION['un']);
    unset($_SESSION['type']);
    header('location:login.php');
  }
  else if (isset($_REQUEST['delPlayer'])) {
    $query = "DELETE from players where id=".$_REQUEST['delPlayer']."";
    execute($query);
    echo "<script>alert('Player Deleted Successfully');</script>";
    echo "<script>window.location.replace('player.php');</script>";
  }
  else if (isset($_REQUEST['delMSG'])) {
    $query = "DELETE from mails where id=".$_REQUEST['delMSG']."";
    execute($query);
    echo "<script>alert('Messsage Deleted Successfully');</script>";
    echo "<script>window.location.replace('mail.php');</script>";
  }
  else if (isset($_REQUEST['delFan'])) {
    $query = "DELETE from fans where id=".$_REQUEST['delFan']."";
    execute($query);
    echo "<script>alert('Fan removed from teams list');</script>";
    echo "<script>window.location.replace('fan.php');</script>";
  }
  else if (isset($_REQUEST['delEvent'])) {
    $query = "DELETE from socials where id=".$_REQUEST['delEvent']."";
    execute($query);
    echo "<script>alert('Event removed from schedule list');</script>";
    echo "<script>window.location.replace('social.php');</script>";
  }
  else if (isset($_REQUEST['changeFan']) && isset($_REQUEST['status'])) {
    if ($_REQUEST['status']=='valid') {
      $status = 'invalid';
    }else{
      $status = 'valid';
    }
    $query = "UPDATE fans SET status='$status' where id=".$_REQUEST['changeFan']."";
    execute($query);
    echo "<script>alert('Fan Status Changed');</script>";
    echo "<script>window.location.replace('fan.php');</script>";

  }
?>