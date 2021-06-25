<?php
require("./Helper/auth.php");
require('./Helper/db.php');
echo $_SESSION['username'];
if(isset($_REQUEST['accepted'])){
    $accepted = stripslashes($_REQUEST['accepted']);
    $accepted = mysqli_real_escape_string($con, $accepted);

    $stmt = mysqli_prepare($con,
        "UPDATE clients SET appointment =
    (SELECT appointments.id FROM 
    ((clients INNER JOIN hospitals ON hospitals.province = clients.province) 
    INNER JOIN appointments ON appointments.hospital = hospitals.hospital) 
    WHERE username = ? LIMIT 1) WHERE username = ?"
    );

    $stmt->bind_param("ss", $user, $user);

    $user = $_SESSION['username'];

    /* execute query */
    $stmt->execute();
    /* bind result variables */
    //$stmt->bind_result($result);
    /* fetch value */
    //$stmt->fetch();
}
$stmt = mysqli_prepare($con,
    "SELECT username, email, clients.province, client_approved, vaccinated, medical_history, appointments.date, appointments.time, hospitals.hospital
           FROM (( clients INNER JOIN hospitals ON hospitals.province = clients.province)
           INNER JOIN appointments ON appointments.id = clients.appointment) WHERE username = ?"
);

if ($stmt == false) {
    echo "failed to fetch from database";
    die();
}
$stmt->bind_param("s", $_SESSION['username']);
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($username, $email, $province, $client_approved, $vaccinated, $medical_history, $appointment_date, $appointment_time, $hospital);
/* fetch value */
$stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ProfPills</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form class='login' action="index.php">
    <h1 class='login-title'>Welcome <?php echo $_SESSION['username'] ?>!</h1>
    <h2 class='login-title'>vaccine proof trial</h2>
    <p>username: <?php echo $username ?></p>
    <p>email: <?php echo $email ?></p>
    <p>province: <?php echo $province ?></p>
    <p>client_approved: <?php echo ($client_approved ? "true" : "false") ?></p>
    <p>vaccinated: <?php echo ($vaccinated ? "true" : "false") ?></p>
    <?php if($appointment_date){
    echo    "<label class='label'>your appointment</label>
            <br>date: " . $appointment_date . "<br>time: ".$appointment_time. "<br>place: ".$hospital."
            <a href='logout.php'><p class='login-lost'>Logout</p></a>";
    }else{
    echo   "<label class='label'>you have no appointment</label>
            <div>
            <input type='checkbox' name='accepted' class='login-checkbox'>
            <label class='label'>I understand the risks of the trial</label>
            </div>"
            ."<input class='login-button' name='submit' type='submit' value='make an appointment'>
            <a href='logout.php'><p class='login-lost'>Logout</p></a>";
    }
    ?>
</form>
</body>
</html>