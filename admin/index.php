<?php

require('./../Helper/db.php');


function getCount($column, $value ){
    $count = 0;
    require('./../Helper/db.php');
    $stmt = mysqli_prepare($con, "SELECT COUNT(*) FROM `clients` WHERE ". $column . " = " . $value);

    if($stmt == false){
    echo "`failed to fetch from database`";
    return 0;
    }

    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($count);
    /* fetch value */
    $stmt->fetch();
    return $count;
}

$registrations_toApprove = getCount("client_approved", "false");
$registrations_approved = getCount("client_approved", "true");
$vaccinated = getCount("vaccinated", "true");;
$appointments = getCount("appointment", "true");

?>

<HTML>
<HEAD>
<TITLE>admin</TITLE>
</HEAD>
<BODY>

<h1>Administrator dashboard</h1>
<p>Registrations that need to approve: <?php echo $registrations_toApprove; ?> </p>
<p>Registrations that are approve: <?php echo $registrations_approved; ?> </p>
<p>Persons vaccinated: <?php echo $vaccinated; ?> </p>
<p>Appointments made: <?php echo $appointments; ?> </p>

</BODY>
</HTML>