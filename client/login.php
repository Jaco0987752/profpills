<html>
<head>
<meta charset="utf-8">
<title>Login Profesional Pills</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
// https://paragonie.com/blog/2015/04/fast-track-safe-and-secure-php-sessionsz
require('../db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);

        $query = "SELECT * FROM `users` WHERE username='$username'";
		
		$result = mysqli_query($con,$query) or die(mysql_error());// rewrite to prepared
		$rows = mysqli_num_rows($result);

        if($rows==1 && password_verify($password, $result->fetch_assoc()["password"])){
	       	$_SESSION['username'] = $username;
	    	header("Location: index.php");
        }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Login Professional Pills</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">New Here? <a href="registration.php">Register</a></p>
  </form>
 
<?php } ?>
</body>
</html>