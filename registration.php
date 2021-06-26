<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration | professional pills</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require('./Helper/db.php');

$stmt = mysqli_prepare($con,
    "SELECT `province` FROM `hospitals`"
);
if($stmt == false){
    echo "failed to fetch from database";
    die();
}
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($province);

$provincesOptions = "";
/* fetch values */
while ($stmt->fetch()) {
    $provincesOptions .= "<Option>" . $province . "</Option>";
}

// name or email already taken.
$taken = false;
$pwdTooShort = false;
$loggedIn = isset($_REQUEST['username']);

if ($loggedIn) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $province = stripslashes($_REQUEST['province']);
    $province = mysqli_real_escape_string($con, $province);
    $birthday = stripslashes($_REQUEST['birthday']);
    $birthday = mysqli_real_escape_string($con, $birthday);
    $telephone = stripslashes($_REQUEST['telephone']);
    $telephone = mysqli_real_escape_string($con, $telephone);
    $address = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con, $address);
    $residential_area = stripslashes($_REQUEST['residential_area']);
    $residential_area = mysqli_real_escape_string($con, $residential_area);

    $query = "SELECT * FROM `clients` WHERE username='$username' or '$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $taken = true;
    } else if (strlen($password) < 8) {
        $pwdTooShort = true;
    } else {
        $query = "INSERT into `clients` (username, password, email, province, client_approved, vaccinated, birthday, telephone, address, residential_area) 
        VALUES 
        ('$username', '" . password_hash($password, PASSWORD_DEFAULT) . "', '$email', '$province', false, false, '$birthday', '$telephone', '$address', '$residential_area')";

        $result = mysqli_query($con, $query);
        if ($result) {
            echo    "<div class='form'>
                    <h3>You are registered successfully.</h3>
                    <br/>Click here to <a href='login.php'>Login</a></div>";
        }else
        {
            echo "error occurred, no result of query<br> $province";
        }
    }
}
if (!$loggedIn or $taken or $pwdTooShort) {
    ?>
    <form class="login" action="" method="post">
        <h1 class="login-title">Register | ProfessionalPills</h1>
        <?php if ($taken) { ?>
            <p class="login-lost">username or email taken. </p>

        <?php } ?>
        <?php if ($pwdTooShort) { ?>
            <p class="login-lost">password too short. </p>

        <?php } ?>
        <input type="text" class="login-input" name="username" minlength="8" maxlength="30" placeholder="Username" required/>
        <input type="email" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" minlength="8" maxlength="30" name="password" placeholder="Password">
        <select class="login-input" name="province">
            <?php echo $provincesOptions;?>
        </select>
        <input type="text" class="login-input" name="telephone" minlength="8" maxlength="30" placeholder="Telephone" required/>
        <input type="text" class="login-input" name="address" minlength="8" maxlength="30" placeholder="address" required/>
        <input type="text" class="login-input" name="residential_area" minlength="8" maxlength="30" placeholder="residential area " required/>
        <label> birthdate</label>
        <input type="date" name="birthday">
        <div>
            <input type="checkbox" required="true" class="login-checkbox" name="nationality">
            <Label class="label" >Nederlandse nationaliteit</Label>
        </div>

        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
    </form>

<?php } ?>
</body>
</html>