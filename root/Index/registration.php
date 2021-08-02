<?php

  require "includes/db_connect.inc.php";

  $genderErr = $cPassErr = $bloodErr = $userNameErr = "";
  $userName = $uPass = $cPass = $uEmail = $uPhone = $uAddress = $uDob = $userGender = $userSSC = $userHSC = $userBlood = "";
  $errExists = 0;
  $regSuccessful = "";


  if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(empty($_POST['u_name'])){
      $userNameErr = "Username cannot be empty!";
      $errExists = 1;
    }else{
      $userName = mysqli_real_escape_string($conn, $_POST['u_name']);
    }

    $uPass = mysqli_real_escape_string($conn, $_POST['u_pwd']);
    $cPass = mysqli_real_escape_string($conn, $_POST['c_pwd']);
    $uEmail = mysqli_real_escape_string($conn,$_POST['u_email']);
    $uPhone = mysqli_real_escape_string($conn,$_POST['phone']);
    $uAddress = mysqli_real_escape_string($conn,$_POST['address']);
    $uDob = mysqli_real_escape_string($conn,$_POST['dob']);

    if($uPass != $cPass){
      $cPassErr = "Passwords doesn't match!";
      $errExists = 1;
    }

    $uPassToDb = password_hash($uPass, PASSWORD_DEFAULT);

    if(empty($_POST['gender'])){
      $genderErr = "Gender cannot be empty!";
      $errExists = 1;
    }else{
      $userGender = mysqli_real_escape_string($conn, $_POST['gender']);
    }

    if(empty($_POST['blood_group'])){
      $bloodErr = "Blood Group cannot be empty!";
      $errExists = 1;
    }else{
      $userBlood = mysqli_real_escape_string($conn, $_POST['blood_group']);
    }

    if(!empty($_POST['ssc'])){
      $userSSC = mysqli_real_escape_string($conn, $_POST['ssc']);
    }

    if(!empty($_POST['hsc'])){
      $userHSC = mysqli_real_escape_string($conn, $_POST['hsc']);
    }

    $uEducation = $userSSC . "," . $userHSC;

    if($errExists != 1){

      $sqlUers = "select id from u_info where username = '$userName'";
      $results = mysqli_query($conn, $sqlUers);

      $rowCount = mysqli_num_rows($results);

      if($rowCount > 0){
        $userNameErr = "User already exists!";
      }
      else{
        $sqlUserInsert = "insert into u_info (username, u_password, email, dob, phone, address, gender, education, blood_type)
        values ('$userName', '$uPassToDb', '$uEmail', '$uDob', '$uPhone', '$uAddress', '$userGender', '$uEducation','$userBlood');";

        mysqli_query($conn, $sqlUserInsert);

        $regSuccessful = "Registration was successful";
      }
    }
  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <div align="center">

      <h3 style="color:green;"><?php echo $regSuccessful; ?></h3>

      <h1>THIS IS A REGISTRATION PAGE</h1>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <table>
          <!-- VALIDATE THE FOLLOWING COMMENTED OUT FIELDS AND RETAIN THEIR DATA -->
          <tr>
            <td> <label>Username: </label> </td>
            <td> <input type="text" name="u_name" value="" required> <span style="color:red;"><?php echo $userNameErr; ?></span> </td>
          </tr>
          <tr>
            <td> <label>Password: </label> </td>
            <td> <input type="password" name="u_pwd" value="" required> </td>
          </tr>
          <tr>
            <td> <label>Confirm Password: </label> </td>
            <td> <input type="password" name="c_pwd" value="" required> <span style="color:red;"><?php echo $cPassErr; ?></span> </td>
          </tr>
          <tr>
            <td> <label>E-mail:</label> </td>
            <td> <input type="email" name="u_email" value="" required> </td>
          </tr>
          <tr>
            <td> <label>Phone: </label> </td>
            <td>+880 <input type="number" name="phone" value="" min="1" required> </td>
          </tr>
          <tr>
            <td valign="top"> <label>Address: </label> </td>
            <td> <textarea name="address" rows="8" cols="80"></textarea> </td>
          </tr>
          <tr>
            <td> <label>DOB: </label> </td>
            <td> <input type="date" name="dob" value="" required> </td>
          </tr>
          <tr>
            <td valign="top"> <label>Gender: </label> </td>
            <td>
                <input type="radio" name="gender" value="male" checked> Male <br>
                <input type="radio" name="gender" value="female" <?php if($userGender == "female") echo "checked"; ?>> Female <br>
                <input type="radio" name="gender" value="others" <?php if($userGender == "others") echo "checked"; ?>> Others <br>
                <span style="color:red"><?php echo $genderErr; ?></span>
            </td>
          </tr>
          <tr>
            <td> <label>Education: </label> </td>
            <td>
              <input type="checkbox" name="ssc" value="ssc" <?php if($userSSC == "ssc") echo "checked"; ?>> SSC;
              <input type="checkbox" name="hsc" value="hsc" <?php if($userHSC == "hsc") echo "checked"; ?>> HSC;
            </td>
          </tr>
          <tr>
            <td> <label>Blood Group: </label> </td>
            <td>
              <select name="blood_group">
                <option value="" disabled selected>Select group...</option>
                <option value="a+" <?php if($userBlood == "a+") echo "selected"; ?>>A+</option> <!-- Actually, the problem was that I had written the php tag inside the </option> tag. It should be inside <option> tag. -->
                <option value="b+" <?php if($userBlood == "b+") echo "selected"; ?>>B+</option>
                <option value="o+" <?php if($userBlood == "o+") echo "selected"; ?>>O+</option>
              </select>
              <span style="color:red"><?php echo $bloodErr; ?></span>
            </td>
          </tr>
          <tr>
            <td colspan="2"> <br> <br> <input type="submit" name="btn_register" value="Register"> </td>
          </tr>
          <tr>
            <td colspan="2"> <label>Already have an account?</label> <a href="login.html">Login</a> </td>
          </tr>
        </table>

      </form>

    </div>





  </body>
</html>
