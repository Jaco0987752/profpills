<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration | professional pills</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('./helper/db.php');

// name or email already taken.
$taken = false;
$loggedIn = isset($_REQUEST['username']);

  if ($loggedIn) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $trn_date = date("Y-m-d H:i:s");

    $query = "SELECT * FROM `clients` WHERE username='$username' or email='$email'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
      echo "logged in";
      if ($rows > 0) {
        $taken = true;
    }
    else
    {
        $query = "INSERT into `clients` (username, password, email) VALUES ('$username', '".password_hash($password, PASSWORD_DEFAULT)."', '$email')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
  }
echo $loggedIn, $taken;
if(! $loggedIn or $taken){
    ?>
	<form class="login" action="" method="post">
    <h1 class="login-title">Register | ProfessionalPills</h1>
<?php if ($taken){ ?>
  <p class="login-lost">username or email taken. </p>

  <?php } ?>

    <input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" placeholder="Email Adress">
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Register" class="login-button">
  <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
  </form>
 
<?php } ?>
</body>
</html>