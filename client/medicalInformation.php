<?php
require('./Helper/db.php');
include("./Helper/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>fill in your medical information.</p>
<p><a href="index.php">Index</a></p>
<form class="login" action="" method="post" name="login">
    <h1 class="login-title">medical information</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus>
    <input type="text" class="login-input" name="password" placeholder="medical status">
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">New Here? <a href="registration.php">Register</a></p>
  </form>
<a href="logout.php">Logout</a>
</div>
</body>
</html>