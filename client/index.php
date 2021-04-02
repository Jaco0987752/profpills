<?php
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>vaccine proof trial</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<h1 >Welcome <?php echo $_SESSION['username']; ?>!</h1>
<p >vaccine proof trial</p>
<p><a href="medicalInformation.php">Fill in your Medical information</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>