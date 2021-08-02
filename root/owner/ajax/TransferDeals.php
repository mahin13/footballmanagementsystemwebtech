<?php
require "includes/db_connect.inc.php";

$sql = "select * from  transferlistedplayers;";
$result = mysqli_query($conn, $sql);

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">'  <link rel="icon" href="icon.ico">
      <link rel="stylesheet" type="text/css" href="style_3.css">'
    <title>AJAX</title>
  </head>
  <body>
    <h1>SEARCH Name</h1>

    <label>Name </label>
    <input type="text" name="myName_1" value="" id="my_name_1">
    <button type="button" name="button_1" id="btn_1">Search</button>
    <br><br>
    <div style="border: 1px solid black;" id="content_1">
      <table align="center" border="1" width="40%">
        <thead>
          <tr>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <h1>ADD Name</h1>
    <label>Name: </label>
    <input type="text" name="myName_2" value="" id="my_name_2">
    <button type="button" name="button_2" id="btn_2">Add Name</button>
    <br><br>
    <div style="border: 1px solid black;" id="content_2">

    </div>

    <script type="text/javascript">

      document.getElementById('my_name_1').addEventListener('keyup',loadResponseGet);
      document.getElementById('btn_2').addEventListener('click',loadResponsePost);

      function loadResponseGet(){
        var my_name = document.getElementById('my_name_1').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'db_operations.php?n='+my_name, true);
        xhr.send();
        xhr.onload = function(){
            if(xhr.status == 200){
                document.getElementById('content_1').innerHTML = this.responseText;
            }else if(this.status == 404){
            document.getElementById('content_1').innerHTML = "404 - NOT FOUND!";
          }
        };
      }

      function loadResponsePost(){
        var my_name = document.getElementById('my_name_2').value;
        var xhr = new XMLHttpRequest();
        var params = "n="+my_name;
        xhr.open('POST', 'db_operations.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(params);
        xhr.onload = function(){
            if(xhr.status == 200){
                document.getElementById('content_2').innerHTML = this.responseText;
            }else if(this.status == 404){
            document.getElementById('content_2').innerHTML = "404 - NOT FOUND!";
          }
        };
      }



    </script>
  </body>
</html>
