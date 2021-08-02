<?php

require "includes/db_connect.inc.php";

session_start();

$uEmail = $uPass = $uPassInDB = "";
$uEmailErr = $uPassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['email'])) {
        $uEmailErr = "Email cannot be empty!";
    } else {
        $uEmail = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $uPassErr = "Password cannot be empty!";
    } else {
        $uPass = $_POST['password'];
    }

    if (!empty($uEmail) && !empty($uPass)) {
        $sqlUserCheck = "select * from information where email = '" . $uEmail . "';";
        // $sqlInsert= "insert into tablename value ('".$name ."','".$email ."','".$password ."','fan')  ";
        //echo $sqlUserCheck;

        $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
        $userCount = mysqli_num_rows($resultUserCheck);

        if ($userCount < 1) {
            $uEmailErr = "User does not exist";
        } else {
            while ($row = mysqli_fetch_assoc($resultUserCheck)) {
                $uPassInDB = $row['password'];
                if (!strcmp($uPassInDB, $uPass)) {
                   // echo ($row);
                     if($row['usertype']=="fan")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../Homepage/homepage.php");


                    }
                    else if ($row['usertype']=="player")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../Player/Player.php");

                    }
                    else if ($row['usertype']=="coach")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../FMS/coach.php");

                    }
                    else if ($row['usertype']=="physio")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../Physio/Physio.php");

                    }
                    else if ($row['usertype']=="owner")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../owner/owner.php");

                    }
                    else if ($row['usertype']=="hr")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../hr/HR.php");

                    }
                    else if ($row['usertype']=="receptio")
                    {
                      $_SESSION["email"] = $uEmail;
                      header("Location:../FMS/receptionist.php");

                    }

                   // $_SESSION["Email"] = $uEmail;
                   //  $_SESSION["username"] = $uEmail;
                   // header("Location:../Homepage/homepage.php");
                } else {

                    //echo "here";
                    $uPassErr = "Wrong password!";
                }
            }
        }
    }
}

?>

<?php



//initializing variables

$username = "";
$email = "";
$password = "";
$errors = array();
$con_password = "";

//coonection to db
//$db = mysqli_connect('localhost','root','','random') or die("could not connect to database");
$conn = new mysqli("localhost", "root", "", "project") or die("could not connect to database");
//register users

if (isset($_POST['sign-up'])) {
    //echo "here";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $con_password = mysqli_real_escape_string($conn, $_POST['con_password']);

    //form validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $con_password) {
        array_push($errors, "Password doesn't match");
    }

    //check db for existing user with same username

    $user_check_query = "SELECT * FROM information WHERE name = '$username' or email = '$email' LIMIT 1";
    $results = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {

        if ($user['username'] == $username) {
            array_push($errors, "Username already exist !! ");
        }
        if ($user['email'] == $email) {
            array_push($errors, "Email already exists !! ");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = 'insert into  information (name,email,password,usertype) VALUES ("' . $username . '","' . $email . '","' . $password . '","fan");';

        //echo $query;

        //mysqli_query($db,$query);
        $conn->query($query);

        echo '<script>alert("Registration complete ! Please log in ");</script>';

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
    } else {
        print_r($errors);
    }
}
// register the user if no error


?>

<!DOCTYPE html>
<html>

<head>
    <title>Login and Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cont">

        <div class="form sign-in">
            <form action="" method="POST">
                <h2>Sign In</h2>
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" value="<?php echo $uEmail; ?>"> <?php echo $uEmailErr; ?>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password"> <?php echo $uPassErr; ?>

                </label>
                <!--  <input type="submit" class="submit" value="Sign In" name="signin"> -->
                <button class="submit" type="submit" name="signin" value="sign in">Sign In</button>

            </form>

            <div class="social-media">
                <ul>

                    <li> <a href="https://www.facebook.com/LiverpoolFC/"> <img src="images/facebook.png"> </a> </li>
                    <li> <a href="https://twitter.com/LFC?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"> <img src="images/twitter.png"> </a> </li>
                    <li> <a href="https://www.youtube.com/user/LiverpoolFC"> <img src="images/youtube.png"> </a> </li>
                    <li> <a href="https://www.instagram.com/liverpoolfc/?hl=en"> <img src="images/instagram.png"> </a> </li>
                </ul>
            </div>
        </div>


        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img-text m-in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>
                    <span class="m-in">Sign In</span>
                </div>
            </div>

            <div class="form sign-up">
                <form action="" method="POST">
                    <h2>Sign Up</h2>
                    <label>
                        <span>Name</span>
                        <input type="text" name="username" required="">
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" required="">
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" required="">
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="con_password" required="">
                    </label>

                    <input type="submit" name="sign-up" value="Sign Up" class="submit">
                    <!-- <button class="submit" type="submit" name="signin" value="sign up">Sign Up</button> -->
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>

</body>

</html>