<?php
    if (isset($_REQUEST['searchy'])) {
      if ($_REQUEST['searchtxt']!='') {
        header('location:search.php?src='.$_REQUEST['searchtxt']);
      }else{
         echo "<script>alert('Please enter some text to search');</script>";
      }
    }
    ?>
</script>
<nav class="navbar navbar-light bg-info navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
              
              <?php if (isset($_SESSION['un'])) {
                if ($_SESSION['type']=='coach') {
                    echo '<a class="linky" href="coach.php"> &copy COACH HOME </a>';
                }else{
                    echo '<a class="linky" href="receptionist.php"> &copy RECEPTIONIST HOME </a>';
                }
              	echo '&nbsp &nbsp &nbsp <a class="linky" href="dealer.php?logout=1"> &times; Logout</a>';
              } else{
                echo '<a class="linky" href="login.php"> LOGIN </a>';
              }?>
              
          </ul>
          <form class="form-inline ml-auto" action="" method="post">
            <input name="searchtxt" class="form-control" style="width:250px;" type="text" placeholder="Search Player/Team/Event">
            <button type="submit" name="searchy" class="btn btn-success">Search</button>
          </form>
        </div>
      </div>
</nav>